<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 10:01
 * 外观模式(Facade Pattern)：
 * 外部与一个子系统的通信必须通过一个统一的外观对象进行，为子系统中的一组接口提供一个一致的界面
 * 外观模式定义了一个高层接口，这个接口使得这一子系统更加容易使用。外观模式又称为门面模式，它是一种对象结构型模式
 *
 * 角色：
 * Facade：外观角色，提供高级接口
 * SubSystem：子系统角色，负责各自的功能实现
 *
 *
 * 使用外观模式最大的优点就是子系统与客户端之间是松耦合的关系，客户端不必知道具体有哪些子系统，也无需知道他们是如何工作的，通过引入一个外观类，提供一个客户端间接访问子系统的高级接口。
 * 子系统和外观类可以独立运作，修改某一个子系统的内容，不会影响到其他子系统，也不会影响到外观对象。不过它的缺点就是它不够灵活，当需要增加一个子系统的时候，需要修改外观类。
 */

class SystemA{

    public function operationA(){

        echo "operationA";
    }
}

class SystemB{

    public function operationB(){

        echo "operationB";
    }
}


class SystemC{

    public function operationC(){

        echo "operationC";
    }
}

class Facade{

    protected $systemA;
    protected $systemB;
    protected $systenC;

    function __construct()
    {
        $this->systemA = new SystemA();
        $this->systemA = new SystemB();
        $this->systemA = new SystemC();
    }

    public function myOperation(){
        $this->systemA->operationA();
        $this->systemB->operationB();
        $this->systenC->operationC();
    }
}

$facade = new Facade();
$facade ->myOperation();


