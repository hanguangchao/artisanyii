<?php

require_once 'order_demo.php';
 
class OrderDemo_TestCase extends PHPUnit_Framework_TestCase
{
    public function testNullIdOrder(){
        //自动创建一个集成OrderDao的mock对象
        $oMockOrderDao = $this->getMock('OrderDao'); 
        //期望不要调用这个对象的insert方法，如果调用，就会报错
            $oMockOrderDao->expects($this->never())->method('insert'); 
         
        $oOm = new OrderManager($oMockOrderDao);
        $aOrder = array('id'=>'');
        $this->assertFalse($oOm->insertOrder($aOrder));
    }
     
    public function testNoIdOrder(){
        $oMockOrderDao = $this->getMock('OrderDao');
        $oMockOrderDao->expects($this->never())->method('insert');
     
        $oOm = new OrderManager($oMockOrderDao);
 
        $aOrder = array();
        $this->assertFalse($oOm->insertOrder($aOrder));
    }
     
    public function testSuccessInsertOrder(){
        $aOrder = array('id'=>'bourneli123456789');
         
        $oMockOrderDao = $this->getMock('OrderDao');
        $oMockOrderDao->expects($this->once())
                      ->method('insert');
     
        $oOm = new OrderManager($oMockOrderDao);
        $this->assertTrue($oOm->insertOrder($aOrder));
    }
     
    public function testOrderIdExisting(){
        $aOrder = array('id'=>'order_id_already_existing dfd');
        //自动创建一个集成OrderDao的mock对象
        $oMockOrderDao = $this->getMock('OrderDao'); 
        //期望调用这个对象insert方法，次数任意。在调用时，输入必须是$aOrder对象，
        //返回必须是0。如果不满足这种期望，将会报错。
        $oMockOrderDao->expects($this->any())
                      ->method('insert')
                      ->with($aOrder)
                      ->will($this->returnValue(0));
     
        $oOm = new OrderManager($oMockOrderDao);
        $this->assertTrue($oOm->insertOrder($aOrder));//真实的调用，并断言调用结果
    }
}
