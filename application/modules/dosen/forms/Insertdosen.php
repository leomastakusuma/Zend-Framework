<?php

class Dosen_Form_Insertdosen extends Zend_Form
{

    public function init()
    {        
             $this->setName('Form Insert Dosen');
             $this->setMethod('POST');
             $this->setAction('Insert');
             $nama = new Zend_Form_Element_Text('nama');
             $nama->setLabel('Nama')
                  ->setRequired(true)
                  ->setAttrib('Size', '35')
                  ->addValidator('NotEmpty')
                  ->addErrorMessage('Nama Tidak Boleh Kosong');
             $jenis_kelamin = new Zend_Form_Element_Select('Jenis_Kelamin');
             $jenis_kelamin->setLabel('Jenis_Kelamin');
             $jenis_kelamin->setMultiOptions(array('L'=>'Laki-Laki', 'P'=>'Perempuan'));
             $jenis_kelamin->setRequired(true);
             
             $matakuliah = new Zend_Form_Element_MultiCheckbox('Matakuliah');
             $matakuliah->setMultiOptions(array('DDP' =>'Dasar-dasar Pemrograman','DS'=>'Desain Grafis'));
             $matakuliah->setLabel('Matakuliah');
             #$matakuliah->setRequired(true);
             #$matakuliah->addErrorMessage('Not Kosong');
             #$matakuliah->addValidator('NotEmpty');
             
             
             $submit    = new Zend_Form_Element_Submit("Simpan");
             $submit->setRequired(true);
             
             $this->addElements(array($nama,$jenis_kelamin,$matakuliah,$submit));
                  
             
             
        
    }


}

