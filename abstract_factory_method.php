<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/11/29
 * Time: 10:23
 */
/*
 * 提供一个创建一系列相关或相互依赖对象的接口，而无须指定它们具体的类。抽象工厂模式又称为Kit模式，属于对象创建型模式。
 * 角色：
 * 抽象工厂（AbstractFactory）：担任这个角色的是抽象工厂模式的核心，是与应用系统的商业逻辑无关的。
 * 具体工厂（Factory）：这个角色直接在客户端的调用下创建产品的实例，这个角色含有选择合适的产品对象的逻辑，而这个逻辑是与应用系统商业逻辑紧密相关的。
 * 抽象产品（AbstractProduct）：担任这个角色的类是抽象工厂模式所创建的对象的父类，或它们共同拥有的接口
 * 具体产品（Product）：抽象工厂模式所创建的任何产品对象都是一个具体的产品类的实例。
 */

interface TV{

    public function open();
    public function watch();

}

class Haier implements TV{

    public function open()
    {
         echo 'open haier TV';
    }

    public function watch()
    {
         echo 'i am watchind TV';
    }
}

interface PC{

    public function work();
    public function play();
}

class LenovoPc implements PC{

    public function work()
    {
        echo 'i am working on lenovo';
    }

    public function play()
    {
        echo 'lenovo computer is used to play games';
    }
}


abstract class Factory{

    abstract static function createTv();
    abstract static function createPc();
}

class createFactory extends Factory{

    public  static function createTv(){

        return new Haier();
    }

    public static function createPc(){

        return new LenovoPc();
    }
}

$TV = createFactory::createTv();
$TV ->open();
$TV ->watch();

$PC = createFactory::createPc();
$PC ->play();
$PC -> work();