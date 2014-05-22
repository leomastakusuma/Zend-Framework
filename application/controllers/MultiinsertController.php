<?php

class MultiinsertController extends Zend_Controller_Action
{

    public function init()
    {
      
    }
    
    public function indexAction() 
    {
        $addmulti = new Application_Form_Multiinsert();
        $this->view->addmulti = $addmulti;
        
        if($this->getRequest()->isPost())
        {
            $form = new Application_Form_Formmulti();
            if($addmulti->isValid($this->_request->getPost()))
            {
               $a=$addmulti->getValue('no');
               $int = intval($a);
               
               
             
               if($int > 1)
               {
                   //lakukan perulangan disini..
                   $this->view->multiinput = $int;
                   for($ulang = intval(1) ; $ulang <= $int ; $ulang++)
                   {
                       
                       $nama           = $form->getSubForm('nama')
                                              ->addElement('text','nama['.$ulang.']',array('label'=>'Nama',
                                                                                           'Required'=>'True',
                                                                                           'Validator'=>'NotEmpty',
                                                                                           'ErrorMessage'=>'Tidak Kosong'
                                                                                            ));
                       
                       $umur           = $form->getSubForm('nama')
                                              ->addElement('text','umur['.$ulang.']',array('label'=>'umur',
                                                                                           ));
                       
                       $jenis_kelamin  = $form->getSubForm('nama')
                                              ->addElement('select','jenis_kelamin['.$ulang.']',
                                                            array('multioptions'=>array('Laki-Laki' => 'Laki-Laki',
                                                                                        'Perempuan' => 'Perempuan'),
                                                                                        'label'=>'jeniskelamin'));
                       
                       $hobi           = $form->getSubForm('nama')
                                              ->addElement('MultiCheckbox','hobi['.$ulang.']', array('multioptions'=>array('renang'     => 'renang',
                                                                                                                           'nonton   '  => 'nonton',
                                                                                                                           'video game' => 'Video Game'
                                                          )));
                                              
                   }
                    
                    $this->view->multiform = $form;
                   
                }
               
               else
               {
                   //tampilkan form insert one disini..
                   return $this->redirect('Mahasiswa/insertmahasiswa');
                   
               }
             
               
            }
        }
    }

    public function insertAction()
    {
        // action body
        $form = new Application_Form_Formmulti();
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->_request->getPost()))
            {                                      
                $post = $this->_request->getParams();
                if (isset($post))
                {                                
                        $test = new Application_Model_DbTable_Mahasiswa();
                        $a=$post['nama'];

                        //definisikan jumlah field yang ada ditabel
                        for($i=1;$i<=count($a)/4;$i++) 
                        {
                            $nama          = $a['nama'.$i];
                            $jenis_kelamin = $a['jenis_kelamin'.$i];
                            $umur          = $a['umur'.$i];
                            $hobies        = $a['hobi'.$i];
                            $hobi_='';
                                foreach ($hobies as $idx=> $hobi)
                                {
                                   if($idx > 0)
                                   {
                                     $hobi_ .=',';   
                                   }
                                   $hobi_ .= $hobi;

                                }

                            $data=array( 'nama'=>$nama,
                                         'jenis_kelamin'=>$jenis_kelamin,
                                         'umur'=>$umur,
                                         'hobi'=>$hobi_
                                       );
//                                       echo '<pre>';
//                                       print_r($data);
                            $test->insert($data);
                         }
                            $this->_redirect('Mahasiswa/index');

                  
                 }
                                 
            }
           
            
        
        }
    }
}





