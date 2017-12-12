<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 12:08
 * 策略模式
 * 策略模式(Strategy Pattern)：定义一系列算法，将每一个算法封装起来，并让它们可以相互替换。策略模式让算法独立于使用它的客户而变化，也称为政策模式(Policy)。

常见示例：常见的排序算法有快速排序，冒泡排序，归并排序，选择排序等，如果我们需要在一个算法类中提供这些算法，一个常见的解决方法就是在类中定义多个方法，每个方法定义一种具体的排序算法，然后使用 if...else...去判断到底是哪种算法，或者直接调用某个具体方法。这种方法是将算法的实现硬编码到类中，这样做最大的弊端就是算法类类非常臃肿，而且当需要增加或者更换一种新的排序方法时候，需要修改算法类的代码，同时也需要修改客户端调用处的代码。策略模式就是为了解决这列问题而设计的。
角色

Context: 环境类，使用一个ConcreteStrategy对象来配置；维护一个对Stategy对象的引用，同时，可以定义一个接口来让Stategy访问它的数据。

Strategy: 抽象策略类，定义所有支持的算法的公共接口。Context使用这个接口来调用某ConcreteStrategy定义的算法；

ConcreteStrategy: 具体策略类，实现 Strategy 接口的具体算法；
 */

abstract class Strategy{
    abstract function use();
}

class StrategyA extends Strategy
{
    public function use()
    {
        echo "这是使用策略A的方法 <br>";
    }
}

class StrategyB extends Strategy
{
    public function use()
    {
        echo "这是使用策略B的方法 <br>";
    }
}

class Context
{
    protected $startegy;
    public function setStrategy(Strategy $startegy)
    {
        $this->startegy = $startegy;
    }

    public function use()
    {
        $this->startegy->use();
    }
}

$context = new Context();
$startegyA = new StrategyA();
$startegyB = new StrategyB();
$context->setStrategy($startegyA);
$context->use();

$context->setStrategy($startegyB);
$context->use();