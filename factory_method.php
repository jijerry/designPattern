<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/11/29
 * Time: 9:53
 */
/*
 * 通过定义一个抽象的核心工厂类，并定义创建产品对象的接口，创建具体产品实例的工作延迟到其工厂子类去完成。这样做的好处是核心类只关注工厂类的接口定义，
 * 而具体的产品实例交给具体的工厂子类去创建。当系统需要新增一个产品，无需修改现有系统代码，只需要添加一个具体产品类和其对应的工厂子类，是系统的扩展性变得很好，符合面向对象编程的开闭原则;
 * 角色：
 * Product：抽象产品类
 * ConcreteProduct：具体产品类
 * Factory：抽象工厂类(核心类)
 * ConcreteFactory：具体工厂类
 *
 *
 *
 * 工厂方法模式是简单工厂模式的进一步抽象和推广。由于使用了面向对象的多态性，工厂方法模式保持了简单工厂模式的优点，而且克服了它的缺点。
 * 在工厂方法模式中，核心的工厂类不再负责所有产品的创建，而是将具体创建工作交给子类去做。
 * 这个核心类仅仅负责给出具体工厂必须实现的接口，而不负责产品类被实例化这种细节，这使得工厂方法模式可以允许系统在不修改工厂角色的情况下引进新产品
 */

interface Animal
{
    public function run();
    public function say();
}

class Cat implements Animal{
    public function run()
    {
        echo 'i run slowly';
    }

    public function say()
    {
        echo 'i am a cat class';
    }

}

class Dog implements Animal
{
    public function run(){
        echo "I'm running fast <br>";
    }
    public function say(){
        echo "I am Dog class <br>";
    }
}

abstract class Factory{

    abstract static function createAnimal();

}

class DogFactory extends Factory{

    public static function createAnimal(){

        return new Dog();
    }
}

class CatFactory extends Factory{

    public static function createAnimal(){

        return new Cat();
    }
}

$cat = CatFactory::createAnimal();
$cat ->run();
$cat ->say();

$dog = DogFactory::createAnimal();
$dog ->say();
$dog ->run();