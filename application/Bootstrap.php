<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    
    protected function _initAutoload()
    {
        $modelLoader    =  new Zend_Application_Module_Autoloader(array(
            'namespace' => '', 'basePath' => APPLICATION_PATH
            
        ));
        $namespace = new Zend_Session_Namespace('Zend_Auth');
        $namespace->setExpirationSeconds(120);
         // echo "<pre>";
         // print_r($modelLoader);
         // die;                
        return $modelLoader;
                
    }
    
    function _initPlugins()
    {
        
        $acl   = new Application_Model_LibraryAcl;
        $auth  = Zend_Auth::getInstance();
        $front = Zend_Controller_Front::getInstance();
        // echo "<pre>";
        // print_r($auth);die;
        $front->registerPlugin(new Plugin_AccessCheck($acl, $auth));
//        $front->registerPlugin(new Plugin_AccessCheck());
    }
    
   

}

