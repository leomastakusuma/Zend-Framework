<?php

class Application_Model_LibraryAcl extends Zend_Acl
{
         
    public function __construct() {
//        
//        $this->add(new Zend_Acl_Resource('index'));
//        $this->add(new Zend_Acl_Resource('Mahasiswa/index'));
       
        
        $this->add(new Zend_Acl_Resource('Mahasiswa'));
        $this->add(new Zend_Acl_Resource('index'),'Mahasiswa');
        $this->add(new Zend_Acl_Resource('insertmahasiswa'),'Mahasiswa');
        $this->add(new Zend_Acl_Resource('editmahasiswa'),'Mahasiswa');
        $this->add(new Zend_Acl_Resource('getmultiedit'),'Mahasiswa');

//        $this->add(new Zend_Acl_Resource('delete'),'Mahasiswa');

        
         
        $this->add(new Zend_Acl_Resource('Multiinsert'));
        $this->add(new Zend_Acl_Resource('insert'),'Multiinsert');
        
        
        $this->add(new Zend_Acl_Resource('Login'));
        $this->add(new Zend_Acl_Resource('logout'),'Login');
//        
        
        $this->addRole(new Zend_Acl_Role('user'));
        $this->addRole(new Zend_Acl_Role('admin'),'user');
        
 
        
        $this->allow('user','Mahasiswa','index');
        $this->allow('user','Login','logout');
        
        $this->allow('admin','Login');
        $this->allow('admin','Mahasiswa');
        $this->allow('admin','Multiinsert');
        
//        $this->allow('admin','Mahasiswa','insertmahasiswa');
//        $this->allow('admin','Mahasiswa','editmahasiswa');
//        $this->allow('admin','Mahasiswa','delete');
        
//        $this->allow('admin','Multiinsert','insert');
                  
    }
     


}

