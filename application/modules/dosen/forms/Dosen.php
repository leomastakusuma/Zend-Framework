<?php

class Dosen_Form_Dosen extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('POST');
        
        $nama = new Zend_Form_Element_Text();
        $nama->setName('Nama')
             ->setLabel('Nama Dosen')
             ->setAttrib('size','20')
             ->setRequired(TRUE)
             ->addValidator('NotEmpty');
        
        $subit = new Zend_Form_Element_Submit();
        $subit->setName('Simpan')
              ->setLabel('Simpan')
              ->setRequired(true);
        
      $this->addElements(array($nama,$subit));
               
             
    }


}

