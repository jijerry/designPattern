<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/11/29
 * Time: 12:27
 */

/*
 * 建造者模式
 * 又名：生成器模式，是一种对象构建模式。它可以将复杂对象的建造过程抽象出来（抽象类别），使这个抽象过程的不同实现方法可以构造出不同表现（属性）的对象。
 * 建造者模式是一步一步创建一个复杂的对象，它允许用户只通过指定复杂对象的类型和内容就可以构建它们，用户不需要知道内部的具体构建细节。
 * 角色：
 * Builder：抽象构造者类，为创建一个Product对象的各个部件指定抽象接口。
 * ConcreteBuilder：具体构造者类，实现Builder的接口以构造和装配该产品的各个部件。定义并明确它所创建的表示。提供一个检索产品的接口
 * Director：指挥者，构造一个使用Builder接口的对象。
 * Product：表示被构造的复杂对象。ConcreateBuilder创建该产品的内部表示并定义它的装配过程。
 * 包含定义组成部件的类，包括将这些部件装配成最终产品的接口。
 *
 *
 */


abstract class Builder
{
    protected $car;

    abstract public function buildPartA();
    abstract public function buildPartB();
}

class CarBuilder extends Builder{
    function __construct()
    {
        $this->car = new Car();

    }

    public function buildPartA()
    {
        $this->car->setPartA('发动机');
    }

    public function buildPartB()
    {
        $this->car->setPartB('零件');
    }
}
class Car
{
    protected $partA;
    protected $partB;

    public function setPartA($str){
        $this->partA = $str;
    }

    public function setPartB($str){
        $this->partB = $str;
    }

    public function show(){
        echo $this->partA,$this->partB;
    }
}

class Director{
    public $mybuilder;

    public function startBuild(){
        $this->mybuilder->buildPartA();
        $this->mybuilder->buildPartB();
    }

    public function setBuild(Builder $builder){

        $this->mybuilder = $builder;
    }
}

$carBuilder = new CarBuilder();
$director = new Director();
$director ->setBuild($carBuilder);
$newcar = $director->startBuild();
$newcar ->show();