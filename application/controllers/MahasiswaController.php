<?php

class MahasiswaController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        	$listmahasiswa = new Application_Model_DbTable_Mahasiswa();
        	$this->view->mahasiswa=$listmahasiswa->getallMahasiswa();
    }

    public function insertmahasiswaAction()
    {
        // action body
        $form   = new Application_Form_InputMahasiswa();
        $this->view->form=$form;
        if($this->getRequest()->isPost())
        {
          if($form->isValid($this->_request->getPost())){                         
            $nama           = $this->getRequest()->getParam('nama');
            $jenis_kelamin  = $this->getRequest()->getParam('jenis_kelamin');
            $umur           = $this->getRequest()->getParam('umur');
            $values         = $form->getValues();
            $hobi           = $values['hobi'];

            $mahasiswa      = new Application_Model_DbTable_Mahasiswa();
            $mahasiswa->insertMahasiswa($nama, $jenis_kelamin, $umur,$hobi);
            $this->_helper->redirector('index');}
          else{
            $this->view->form=$form;}
        }
                
    }

    public function deleteAction()
    {
     $deletemahasiswa    = new Application_Model_DbTable_Mahasiswa();
     if ($this->getRequest()->isPost()){
        $id = $this->getParam('multi');
        $deletemahasiswa->deleteMahasiswa($id);} 
     else{
        $id_mahasiswa       = $this->getRequest()->getParam('id');
        $deletemahasiswa->deleteMahasiswa($id_mahasiswa); }
     
     $this->_helper->redirector('index');
    }

    public function editmahasiswaAction()
    {
        $id_mahasiswa = $this->getRequest()->getParam('id');
        if(!empty($id_mahasiswa))
        {
        $edit_mahasiswa = new Application_Model_DbTable_Mahasiswa();
        $data           = $edit_mahasiswa->geteditMahasiswa($id_mahasiswa);
        $form           = new Application_Form_Editmahasiswa(null, $data);
        $form->populate($data);
        //pecah array
        $hobbies = explode(',', $data['hobi']);
        $form->getElement('hobi')->setValue($hobbies);

            
        $this->view->editmahasiswa= $form;
              
           if ($this->getRequest()->isPost()){
              if($form->isValid($this->_request->getPost())){
                $nama  = $this->getRequest()->getParam('nama');
                $jenis_kelamin  = $this->getRequest()->getParam('jenis_kelamin');
                $umur           = $this->getRequest()->getParam('umur');

                $values         = $form->getValues();
                $hobi           = $values['hobi'];
                //print_r($hobi);
                $mahasiswa      = new Application_Model_DbTable_Mahasiswa();
                //$mahasiswa->updateMahasiswa($id_mahasiswa, $nama, $jenis_kelamin, $hobi, $umur);
                $mahasiswa->updateMahasiswa($id_mahasiswa, $nama, $jenis_kelamin,$hobi, $umur);
                $this->_forward('index');}
               else{ $this->view->editmahasiswa= $form;}
           }
        }
        else{ $this->_helper->redirector('index','mahasiswa'); 
    }
    }
    public function editmultiAction()
    {
        // action body
        $listmahasiswa = new Application_Model_DbTable_Mahasiswa();
        $this->view->mahasiswamulti=$listmahasiswa->fetchAll();
        
    }

    public function getmultieditAction()
    {
       
       if($this->getRequest()->isPost())
       {
       	$id = $this->getParam('multi');
	       if (isset($id))
	       {
                 
                 $form = new Application_Form_Formmulti();     
//                 
//                 for($ulang=1 ; $ulang<=  count($id);$ulang++)
//                 {
//                     $nama           = $form->getSubForm('nama')
//                                              ->addElement('text','nama',array('label'=>'Nama',
//                                                                                           'Required'=>'True',
//                                                                                           'Validator'=>'NotEmpty',
//                                                                                           'ErrorMessage'=>'Tidak Kosong'
//                                                                                            ));
//                       
//                     $umur           = $form->getSubForm('nama')
//                                              ->addElement('text','umur',array('label'=>'umur',
//                                                                                           ));
//                       
//                     $jenis_kelamin  = $form->getSubForm('nama')
//                                              ->addElement('select','jenis_kelamin',
//                                                            array('multioptions'=>array('Laki-Laki' => 'Laki-Laki',
//                                                                                        'Perempuan' => 'Perempuan'),
//                                                                                        'label'=>'jeniskelamin'));
//                       
//                     $hobi           = $form->getSubForm('nama')
//                                              ->addElement('MultiCheckbox','hobi', array('multioptions'=>array('renang'     => 'renang',
//                                                                                                                           'nonton   '  => 'nonton',
//                                                                                                                           'video game' => 'Video Game'
//                                                          )));
                                              
                         
//                 }
//                 echo $this->view->multiedit = $form;
	       	 
                 $geteditmahasiswa = new Application_Model_DbTable_Mahasiswa();
	       	 $idx=  intval(1);
	       	 foreach ($id as $idx=>$idmulti)
	       	 {      $data           = $geteditmahasiswa->geteditMahasiswa($idmulti);
                        $nama           = $form->getSubForm('nama')
                                               ->addElement('text','nama',array('label'=>'Nama',
                                                                                           'Required'=>'True',
                                                                                           'Validator'=>'NotEmpty',
                                                                                           'ErrorMessage'=>'Tidak Kosong'
                                                                                                                   ));
                                          
                                                                                                        
                        
                                             
//	       	 	
	       	 	$form->populate($data);
//	       	 	$hobbies = explode(',', $data['hobi']);
////                        $form->getElement('hobi')->setValue($hobbies);
//	       	 	
	       	 	echo $this->view->formmultiedit=$form;
//	       	 	
	       	 	
	       	 }
	       	 
	       	 
	       }
       	

           
       }
    
                          
    }

    public function cariAction()
    {
        // action body
        if($this->getRequest()->isPost())
        {
            $nama  = $this->getParam('cari');
            $cari  = new Application_Model_DbTable_Mahasiswa();
            $this->view->findsearch=$cari->cari($nama);
        }
    }


}

