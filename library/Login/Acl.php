<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acl
 *
 * @author leomasta
 */
class Acl extends Zend_Acl{
    //put your code here
    
    public function __construct() 
    {
        $this->loadRoles($db);
//        $roles = 's';
        
    }
    public function loadRoles($db)
    {
        
    }
    public function loadResources($db, $role)
    {
        
    }
    
}
