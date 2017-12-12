<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 12:03
 * 观察者模式
 *
 * 在此种模式中，一个目标对象管理所有相依于它的观察者对象，并且在它本身的状态改变时主动发出通知。这通常透过呼叫各观察者所提供的方法来实现。此种模式通常被用来实时事件处理系统。观察者模式又叫做发布-订阅（Publish/Subscribe）模式、模型-视图（Model/View）模式、源-监听器（Source/Listener）模式或从属者（Dependents）模式。

角色

Subject: 抽象目标类，一般至少提供三个接口：

添附(Attach)：新增观察者到串炼内，以追踪目标对象的变化。
解附(Detach)：将已经存在的观察者从串炼中移除。
通知(Notify)：利用观察者所提供的更新函式来通知此目标已经产生变化。
ConcreteSubject: 具体目标，提供了观察者欲追踪的状态，也可设置目标状态

Observer: 抽象观察者，定义观察者的更新操作接口

ConcreteObserver: 具体观察者，实现抽象观察者的接口，做出自己的更新操作
 *
 *
 *
 * 主要作用：

当抽象个体有两个互相依赖的层面时。封装这些层面在单独的对象内将可允许程序员单独地去变更与重复使用这些对象，而不会产生两者之间交互的问题。
当其中一个对象的变更会影响其他对象，却又不知道多少对象必须被同时变更时。
当对象应该有能力通知其他对象，又不应该知道其他对象的实做细节时。
 */

abstract class Obeserver{
    abstract function update(Subject $sub);
}

abstract class Subject{
    protected static $obeservers;
    function __construct()
    {
        if (!isset(self::$obeservers)) {
            self::$obeservers = [];
        }
    }
    public function attach(Obeserver $obeserver){
        if (!in_array($obeserver, self::$obeservers)) {
            self::$obeservers[] = $obeserver;
        }
    }
    public function deattach(Obeserver $obeserver){
        if (in_array($obeserver, self::$obeservers)) {
            $key = array_search($obeserver,self::$obeservers);
            unset(self::$obeservers[$key]);
        }
    }
    abstract public function setState($state);
    abstract public function getState();
    public function notify()
    {
        foreach (self::$obeservers as $key => $value) {
            $value->update($this);
        }
    }
}

class MySubject extends Subject
{
    protected $state;
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}

class MyObeserver extends Obeserver
{
    protected $obeserverName;
    function __construct($name)
    {
        $this->obeserverName = $name;
    }
    public function update(Subject $sub)
    {
        $state = $sub->getState();
        echo "Update Obeserver[".$this->obeserverName.'] State: '.$state . '<br>';
    }
}

$subject = new MySubject();
$one = new MyObeserver('one');
$two = new MyObeserver('two');

$subject->attach($one);
$subject->attach($two);
$subject->setState(1);
$subject->notify();
echo "--------------------- <br>";
$subject->setState(2);
$subject->deattach($two);
$subject->notify();