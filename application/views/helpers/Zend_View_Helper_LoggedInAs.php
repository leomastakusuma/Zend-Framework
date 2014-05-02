<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Zend_View_Helper_LoggedInAs
 *
 * @author leomasta
 */
class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract {
    //put your code here
    public function LoggedInAs()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity())
        {
            $username   =   $auth->getIdentity()->username;
            $logouturl  = $this->view->url(array('controller'=>'login','action'=>'logut'),NULL, TRUE);
            return 'welcome'.$username.'. Logout';
        }
        
        $request  = Zend_Controller_Front::getInstance()->getRequest()  ;
        $controller = $request->getControllerName();
        $action     = $request->getActionName();
        if($controller=='login' && $action =='index')
        {
            return '';
        }
        $loginUrl    = $this->view->url(array('controller'=>'login','action'=>'index'));
        return 'login';
        
    }
}

///http://akrabat.com/zend-auth-tutorial/