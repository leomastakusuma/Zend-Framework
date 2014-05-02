<?php

class Plugin_AccessCheck  extends Zend_Controller_Plugin_Abstract{
    //put your code here 

    private $_acl=null;
    private $_auth = null;
    
    public function __construct(Zend_Acl $acl, Zend_Auth $auth)
    {
        $this->_acl =$acl;
        $this->_auth = $auth;
        
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $resource    =$request->getControllerName();
        $action   =$request->getActionName();
      
        $identify = $this->_auth->getStorage()->read();
      
//     menentukan apakah role ditemukan atau tidak
       if(!empty($identify))
         {$role = $identify->role;}
       else{$role = $identify['role'];}
       
//     Setelah ditemukan makan selanjutnya dimasukan ke hak akses
//     Jika Belom login Maka secara default akan di lempar ke halaman login            
         try {if(!$this->_acl->isAllowed($role, $resource, $action)){
       	    	$request->setControllerName('login')
       	    			 ->setActionName('login');}
             }
         catch (Exception $err){
         	  print_r($err->getMessage());}
      
    }
    
    
}
