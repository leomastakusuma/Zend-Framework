<?php

class Application_Form_Editmahasiswa extends Zend_Form
{

    public function init()
    {
        $this->setName('Form Update Mahasiswa');
        $this->setMethod('post');
        
        $nama = new Zend_Form_Element_Text('nama');
        $nama->setLabel('Nama');
        $nama->setRequired(TRUE);
        $nama->setAttrib('size', '50');
        $nama->addValidator('NotEmpty');
        $nama->addErrorMessage('Nama Tidak Boleh Kosong');
       
        $jenis_kelamin= new Zend_Form_Element_Select('jenis_kelamin');
        /*$jenis_kelamin->addMultiOption('Laki-Laki','Laki-Laki');
        $jenis_kelamin->addMultiOption('Wanita','Wanita');
         * 
         */
        $jenis_kelamin->setMultiOptions(array('Laki-Laki'=>'Laki-Laki',
                                              'Wanita'  =>'Wanita'));
        $jenis_kelamin->setLabel('Pilihan');
          
        $umur   = new Zend_Form_Element_Text('umur');
        $umur   ->setLabel('Umur')
                 ->addValidator('NotEmpty')
                 ->setAttribs(array('class'=>'',
                                   'size'=>'2'))
                 ->setRequired(TRUE)
                // ->addValidator(new Zend_Validate_Alnum())
                // ->addValidator('regex', false, array('/^[a-z]/i'))
                 ->addErrorMessage('Umur Tidak Boleh Kosong');
        
        $hobi         = new Zend_Form_Element_MultiCheckbox('hobi');
        $hobi         ->setMultiOptions(array
                                        ('renang'       => 'renang',
                                         'nonton'       => 'nonton',
                                         'Video Game'   => 'Video Game'
                                           ))
                      ->setLabel('Hobby');
        
        
        
        
        
       $submit = new Zend_Form_Element_Submit('Simpan');
       $submit->setLabel('Simpan');
                   
       $this->addElements(array($nama,$jenis_kelamin,$hobi,$umur,$submit));
    }


}

