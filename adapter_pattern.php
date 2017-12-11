<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/11
 * Time: 16:56
 *
 * 适配器类可以向用户提供可用的接口，其内部将收到的请求转换为对适配者对应接口的真是请求，从而实现对不兼容的类的复用
 * 优点：将目标类和适配者类解耦，通过引入一个适配器类来重用现有的适配者类，而无须修改原有代码。增加了类的透明性和复用性，将具体的实现封装在适配者类中，对于客户端类来说是透明的，而且提高了适配者的复用性
 *
 * 角色：
 * Target：目标抽象类
 * Adapter：适配器类
 * Adaptee：适配者类
 * Client：客户类
 */

class Adaptee{

    public function realRequest(){

        echo "这是被适配者真正调用的方法";
    }
}

interface Target{

    public function request();

}

class Adapter implements Target{

    protected $adaptee;

    function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;

    }

    public function request()
    {

        echo "适配器转换";
        $this->adaptee->realRequest();
    }

}

$adaptee = new Adaptee();

$target = new Adapter($adaptee);

$target ->request();