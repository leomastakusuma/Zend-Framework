<?php

class Dosen_Model_DbTable_Dosen extends Zend_Db_Table_Abstract
{

    protected $_name = 'dosen';
   
    public function getDosen($order='Nip')
    {
        $query = $this->select();
        $query->from(($this->_name),array('*'));
        $query->order($query);
        $getalldosen = $this->fetchAll($query);
        echo'<pre>';
        print_r($getalldosen);die;
        return $getalldosen;
    }
  
}

