<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 11:05
 *
 * 代理模式
 *
 * 代理对象可以在客户端和目标对象之间起到 中介的作用，并且可以通过代理对象去掉客户不能看到 的内容和服务或者添加客户需要的额外服务
 *
 * 角色
 * Subject: 抽象主题角色
 * Proxy: 代理主题角色
 * RealSubject: 真实主题角色
 */

interface Subject{
    public function request();
}

class RealSubject implements Subject
{
    public function request()
    {
        echo "RealSubject::request <br>";
    }
}

class Proxy implements Subject
{
    protected $realSubject;
    function __construct()
    {
        $this->realSubject = new RealSubject();
    }

    public function beforeRequest()
    {
        echo "Proxy::beforeRequest <br>";
    }

    public function request()
    {
        $this->beforeRequest();
        $this->realSubject->request();
        $this->afterRequest();
    }

    public function afterRequest()
    {
        echo "Proxy::afterRequest <br>";
    }
}

$proxy = new Proxy();
$proxy->request();