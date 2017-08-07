<?php
class OrderDao{
    public function insert($aOrder){    
        if($aOrder['id'] == 'order_id_already_existing'){
            return -1;
        }
         
        // 这个方法只是简单的模拟，不作实质的数据库操作
        print "connect to db\n";
        print "execute query\n";
        print "1 row effected\n";
        print "insert order {$aOrder['id']} successfully\n";
        return 0;
    }
}
 
class OrderManager{
    private $_oOrderDao;
    public function __construct(OrderDao $oOd){
        $this->_oOrderDao = $oOd;
    }
    public function insertOrder($aOrder){
        if(array_key_exists('id', $aOrder) && $aOrder['id'] != ''){
            print "order {$aOrder['id']} is valide!\n";
            if($this->_oOrderDao->insert($aOrder) == 0){
                print "call dao insert successfully\n";
                return true;
            }
            else{
                print "insert error!\n";
                return false;
            }           
        }else{
            print "order {\$aOrder['id']} is invalide!\n";
            return false;
        }
    }
}
