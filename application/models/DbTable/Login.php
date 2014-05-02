<?php

class Application_Model_DbTable_Login extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';
    protected $_primary = 'id';
  
    public function login($username,$password)
    {
        
        
    }

}

