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
        $this->view->forminsert = $form;
       
        if($this->getRequest()->isPost()){
            if($form->isValid($this->_request->getpost())){
                $nama       = $this->getRequest()->getParam('nama');
                $jenisk     = $this->getRequest()->getParam('Jenis_Kelamin');
                $values     = $form->getValues ();
                $matakuliah = $values ['Matakuliah'];
                $dosen      = new Dosen_Model_DbTable_Dosen();
                $dosen->insertDosen($nama, $jenisk, $matakuliah);
                $this->_helper->redirector ( 'insert' );
            }
            else
            {
                $this->view->form = $form;
            }
        }
        
    }

    public function editAction()
    {
        
    }



}



