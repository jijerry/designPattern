<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 12:07
 *
 * 状态模式
 * 状态模式：允许一个对象在其内部状态改变时改变它的行为。对象看起来似乎修改了它的类。其别名为状态对象(Objects for States)，状态模式是一种对象行为型模式。

有时，一个对象的行为受其一个或多个具体的属性变化而变化，这样的属性也叫作状态，这样的的对象也叫作有状态的对象。

角色

Context: 环境类，维护一个ConcreteState子类的实例，这个实例定义当前状态；

State: 抽象状态类，定义一个接口以封装与Context的一个特定状态相关的行为；

ConcreteState: 具体状态类，每一个子类实现一个与Context的一个状态相关的行为。
 */

class Context{
    protected $state;
    function __construct()
    {
        $this->state = StateA::getInstance();
    }
    public function changeState(State $state)
    {
        $this->state = $state;
    }

    public function request()
    {
        $this->state->handle($this);
    }
}

abstract class State{
    abstract function handle(Context $context);
}

class StateA extends State
{
    private static $instance;
    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function handle(Context $context)
    {
        echo "doing something in State A.\n done,change state to B <br>";
        $context->changeState(StateB::getInstance());
    }
}

class StateB extends State
{
    private static $instance;
    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function handle(Context $context)
    {
        echo "doing something in State B.\n done,change state to A <br>";
        $context->changeState(StateA::getInstance());
    }
}

$context = new Context();
$context->request();
$context->request();
$context->request();
$context->request();