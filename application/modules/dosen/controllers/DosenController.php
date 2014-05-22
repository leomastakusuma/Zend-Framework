<?php

class Dosen_DosenController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $lookdosen = new Dosen_Model_Dosen();
        $this->view->dosen = $lookdosen->getDosen();
    }

    public function insertAction()
    {
        $form = new Dosen_Form_Insertdosen();
//        print_r($form);die;
        $this->view->forminsert = $form;
        
    }


}



