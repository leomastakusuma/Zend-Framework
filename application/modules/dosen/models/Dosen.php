<?php

class Dosen_Model_Dosen extends Zend_Db_Table_Abstract
{

    protected $_name = 'dosen';
    protected $_primary = 'Nip';

    public function getDosen($order='Nip')
    {

        $query = $this->select();
        $query->from(($this->_name),array('*'));
        // print_r($query->__toString());die;
        $query->order($order,'dsc');
        $getalldosen = $this->fetchAll($query);
        return $getalldosen;
    }
  
    public function getList()
    {
        $select = $this->select();
        $select->from($this->_name);
        $select->columns('*');
        $list = $this->fetchAll($select);
        return $list;
    }
}

