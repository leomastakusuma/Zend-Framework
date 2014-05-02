<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('Form Login');
        $this->setMethod('post');
        
        $username = new Zend_Form_Element_Text('username');
        $username->setAttrib('size', '15')
                 ->setLabel('Username')
                 ->addValidator('NotEmpty')
                 ->setRequired(TRUE)
                 ->addErrorMessage('Username Tidak Boleh Kosong');
        
        $password = new Zend_Form_Element_Password('password');
        $password->setAttrib('size', '15')
                 ->setLabel('Password')
                 ->addValidator('NotEmpty')
                 ->setRequired(TRUE)
                 ->addErrorMessage('Password Tidak Boleh Kosong');
        /*$password2 = new Zend_Form_Element_Text(array('password','password2'));
        $password2->setLabel('Confirm Password::')
                    ->setAttrib('size',50);
         * 
         */
        
        $submit  = new Zend_Form_Element_Submit('Login');
        $submit->setLabel('Login');
         $this->addElements(array($username,$password,$submit));
    }


}

