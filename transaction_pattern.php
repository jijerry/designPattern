<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 11:31
 *命令模式
 * 主要特点就是将一个请求封装为一个对象，从而使我们可用不同的请求对客户进行参数化；对请求排队或者记录请求日志，以及支持可撤销的操作。命令模式是一种对象行为型模式，其别名为动作(Action)模式或事务(Transaction)模式。
 *
 * 角色
 * Command: 抽象命令类
 * ConcreteCommand: 具体命令类
 * Invoker: 调用者
 * Receiver: 接收者
 * Client:客户类
 */


class Receiver
{
    public function Action()
    {
        echo "Receiver->Action";
    }
}

abstract class Command{
    protected $receiver;
    function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }
    abstract public function Execute();
}

class MyCommand extends Command
{
    function __construct(Receiver $receiver)
    {
        parent::__construct($receiver);
    }

    public function Execute()
    {
        $this->receiver->Action();
    }
}

class Invoker
{
    protected $command;
    function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function Invoke()
    {
        $this->command->Execute();
    }
}

$receiver = new Receiver();
$command = new MyCommand($receiver);
$invoker = new Invoker($command);
$invoker->Invoke();