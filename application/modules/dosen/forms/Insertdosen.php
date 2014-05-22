<?php

class Dosen_Form_Insertdosen extends Zend_Form
{

    public function init()
    {        
             $this->setName('Form Insert Dosen');
             $this->setMethod('POST');
             
             $nama = new Zend_Form_Element_Text('nama');
             $nama->setLabel('Nama')
                  ->setRequired(true)
                  ->setAttrib('Size', '35')
                  ->addValidator('NotEmpty')
                  ->addErrorMessage('Nama Tidak Boleh Kosong');
             $jenis_kelamin = new Zend_Form_Element_Select('Jenis Kelamin');
             $jenis_kelamin->setLabel('Jenis Kelamin');
             $jenis_kelamin->setMultiOptions(array('L'=>'Laki-Laki', 'P'=>'Perempuan'));
             
             $matakuliah = new Zend_Form_Element_MultiCheckbox('Matuliah');
             $matakuliah->setMultiOptions(array('DDP' =>'Dasar-dasar Pemrograman','DS'=>'Desain Grafis'));
             $matakuliah->setLabel('Matakuliah');
             
             $submit    = new Zend_Form_Element_Submit("Simpan");
             $submit->setRequired(true);
             
             $this->addElements(array($nama,$jenis_kelamin,$matakuliah,$submit));
                  
             
             
        
    }


}

