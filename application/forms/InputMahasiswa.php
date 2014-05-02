<?php

class Application_Form_InputMahasiswa extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('FormInputMahasiswa');
        $this->setMethod('post');
        $this->setAction('insertmahasiswa');
        
        $nama = new Zend_Form_Element_Text('nama');
        $nama->setLabel('Nama');
        $nama->setRequired(TRUE);
        $nama->setAttrib('size', '50');
        $nama->addValidator('NotEmpty');
        $nama->addErrorMessage('Nama Tidak Boleh Kosong');
       
        $jenis_kelamin= new Zend_Form_Element_Select('jenis_kelamin');
        $jenis_kelamin->addMultiOption('Laki-Laki','Laki-Laki');
        $jenis_kelamin->addMultiOption('Wanita','Wanita');
        $jenis_kelamin->setLabel('Pilihan');   
        
        $hobi         = new Zend_Form_Element_MultiCheckbox('hobi');
        $hobi         ->setMultiOptions(array
                                        ('renang'       => 'renang',
                                         'nonton'       => 'nonton',
                                         'Video Game'   => 'Video Game'
            
                                        ))
                      ->setLabel('Hobby');
        
        
        $umur   = new Zend_Form_Element_Text('umur');
        $umur   ->setLabel('Umur')
                 ->addValidator('NotEmpty')
                 ->setAttrib('class', 'large')
                 ->setRequired(TRUE)
                 ->addErrorMessage('Umur Tidak Boleh Kosong');
             
       $submit = new Zend_Form_Element_Submit('Simpan');
       $submit->setLabel('Simpan');
                   
       $this->addElements(array($nama,$jenis_kelamin,$umur,$hobi,$submit));
         
        
    }


}

