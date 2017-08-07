<?php 
require_once 'order_demo.php';
 
class OrderDaoMock extends OrderDao{
    public function insert($aOrder){
        print "Mock Info: insert order {$aOrder['id']} successfully\n";
        return 0;
    }
}
 
class OrderDemo_TestCase extends PHPUnit_Framework_TestCase{
    public function testNullIdOrder(){
        $oOm = new OrderManager(new OrderDaoMock());
        $aOrder = array('id'=>'');
        $this->assertFalse($oOm->insertOrder($aOrder));
    }
     
    public function testNoIdOrder(){
        $oOm = new OrderManager(new OrderDaoMock());
        $aOrder = array();
        $this->assertFalse($oOm->insertOrder($aOrder));
    }
     
    public function testSuccessInsertOrder(){
        $oOm = new OrderManager(new OrderDaoMock());
        $aOrder = array('id'=>'bourneli123456789');
        $this->assertTrue($oOm->insertOrder($aOrder));
    }
}
