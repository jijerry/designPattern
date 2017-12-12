<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 10:21
 *
 * 享元模式
 *
 *  内部状态存储于flyweight中，它包含了独立于flyweight场景的信息，这些信息使得flyweight可以被共享。而外部状态取决于flyweight场景，并根据场景而变化，因此不可共享。用户对象负责在必要的时候将外部状态传递给flyweight
 *
 * 角色
 * Flyweight： 抽象享元类
 * ConcreteFlyweight： 具体享元类
 * UnsharedConcreteFlyweight： 非共享具体享元类
 * FlyweightFactory： 享元工厂类
 *
 *
 * 享元模式的核心在于享元工厂类，享元工厂类的作用在于提供一个用于存储享元对象的享元池，用户需要对象时，首先从享元池中获取，如果享元池中不存在，则创建一个新的享元对象返回给用户，并在享元池中保存该新增对象
 */

interface Flyweight{
    public function operation();
}

class MyFlyweight implements Flyweight{

    protected $intrinsicState;

    function __construct($str)
    {
        $this->intrinsicState = $str;
    }

    public function operation()
    {
        echo 'MyFlyweight['.$this->intrinsicState.'] do operation.';
    }
}

class FlyweightFactory{

    protected static $flyweightPool;

    function __construct()
    {
        if (!isset(self::$flyweightPool)){

            self::$flyweightPool = [];
        }
    }

    public function getFlyweight($str){

        if (!array_key_exists($str, self::$flyweightPool)){

            $fw = new MyFlyweight($str);
            self::$flyweightPool[$str] = $fw;

            return $fw;
        }else{

            echo 'aleady in the pool,use the exist one';

            return self::$flyweightPool[$str];
        }
    }
}


$factory = new FlyweightFactory();
$fw = $factory->getFlyweight('one');
$fw->operation();

$fw1 = $factory->getFlyweight('two');
$fw1->operation();

$fw2 = $factory->getFlyweight('one');
$fw2->operation();
