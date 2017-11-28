<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/11/28
 * Time: 22:14
 */

/*
 * 1.简单工厂模式
 * 又称为静态工厂方法(Static Factory Method)模式，它属于类创建型模式。
 * 在简单工厂模式中，可以根据参数的不同返回不同类的实例。简单工厂模式专门定义一个类来负责创建其他类的实例，被创建的实例通常都具有共同的父类
 *
 * 角色：
 * Factory类：负责创建具体产品的实例
 * Product类：抽象产品类，定义产品子类的公共接口
 * ConcreteProduct 类：具体产品类，实现Product父类的接口功能，也可添加自定义的功能
 *
 *
 * 简单工厂模式最大的优点在于实现对象的创建和对象的使用分离，将对象的创建交给专门的工厂类负责
 * 但是其最大的缺点在于工厂类不够灵活，增加新的具体产品需要修改工厂类的判断逻辑代码，而且产品较多时，工厂方法代码将会非常复杂
 */

class Cat
{
    public function __construct()
    {
        echo "i am cat class".PHP_EOL;
    }

}
class Dog
{
    function __construct()
    {
        echo 'i am dog class'.PHP_EOL;
    }

}

class Factory
{

    public static function CreateAnimal($name){
        if ($name == 'cat'){
            return new Cat();
        }elseif ($name == 'dog'){
            return new Dog();
        }
    }

}

$cat = Factory::CreateAnimal('cat');
$dog = Factory::CreateAnimal('dog');




