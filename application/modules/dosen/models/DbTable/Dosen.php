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

    public function insertDosen($nama,$jenis_kelamin,$matakuliah)
    {
        $matakuliah_ = '';
        foreach ($matakuliah as $idx=> $bahanampu)
        {
             if($idx > 0)
            {
                $matakuliah_ .=',';
            }
            $matakuliah_ .= $bahanampu;
        }
       
        $data = array('Nama'=>$nama, 'Jenis_Kelamin'=>$jenis_kelamin, 'Matakuliah'=>$matakuliah_);
        $this->insert($data);
        

        
    }
  
}

