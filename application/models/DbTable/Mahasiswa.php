<?php

class Application_Model_DbTable_Mahasiswa extends Zend_Db_Table_Abstract
{

    protected $_name = 'mahasiswa';
     
    
    public function getallMahasiswa($order='id_mahasiswa')
    {
        $query = $this->select();
        $query->from(($this->_name),array('*'));
        $query->order($order,'dsc');
        $getmahasiswa = $this->fetchAll($query);
        return $getmahasiswa;
    }
    
    public function cari($cari)
    {
        $query    = $this->select();
        $query->from(($this->_name),array('*'));     
        $query->where('Nama LIKE ?', "%$cari%");
        $query->orWhere('id_mahasiswa = ?', $cari);
        $find     = $this->fetchAll($query)->toArray();
        return $find;
    }

    public function insertMahasiswa($nama,$jenis_kelamin,$umur,$hobi)
    {   $hobi_      ='';
        foreach ($hobi as $idx=>$hobies) 
        {
            if($idx > 0)
            {
                $hobi_ .=',';
            }
            
                $hobi_ .= $hobies;
        }
//        print_r($hobi_);die;
        $data       =   array('Nama'=>$nama,
                              'Jenis_kelamin'=>$jenis_kelamin,
                              'Umur' => $umur,
                              'hobi' => $hobi_
                               );
      
                               $this->insert($data);
    }
    
    public function deleteMahasiswa($id_mahasiswa)
    {

        if (count($id_mahasiswa) > 1) {
            foreach ($id_mahasiswa as $k) {
                $where = $this->getAdapter()->quoteInto('id_mahasiswa= ?', $k);
                //$where[]  = $this->getAdapter()->quoteInto('id_mahasiswa = ?', $k);
               // print_r($where);
                $this->delete($where);
            }
        } else {
            $where = $this->getAdapter()->quoteInto('id_mahasiswa = ?', $id_mahasiswa);
            $this->delete($where);
                 
        }
    }
    
    public function geteditMahasiswa($id_mahasiswa)
    {
       $query        = $this->select();
       $query->from(('mahasiswa'),array('id_mahasiswa','nama','jenis_kelamin','hobi','umur'));
       $query->where('id_mahasiswa = ?',$id_mahasiswa);
       $lookmahasiswa  = $this->fetchRow($query)->toArray();
       return $lookmahasiswa;
    }
    
    public function updateMahasiswa($id_mahasiswa,$nama,$jenis_kelamin,$hobi,$umur)
    {   
        $hobi_      ='';
        foreach ($hobi as $idx=>$hobies) 
        {
         if($idx > 0){
            $hobi_ .=',';
            }
        
        $hobi_ .= $hobies;
        }
        
        
        $data       = array ('nama' => $nama,
                             'jenis_kelamin' => $jenis_kelamin,
                             'umur'          => $umur,
                             'hobi'          => $hobi_,
                             );
        $where      = $this->getAdapter()->quoteInto('id_mahasiswa = ?', $id_mahasiswa);
        $this->update($data, $where);
    }
    
    public function getmultiedit($id_mahasiswa)
    {
        $query = $this->select();
        
    }
}

