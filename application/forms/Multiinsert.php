<?php

class Application_Form_Multiinsert extends Zend_Form
{

    public function init()
    {
       $this->setName('Multi Insert Mahasiswa');
       $this->setMethod('Post');
       
           $no = new Zend_Form_Element_Text('no');
           $no ->setRequired(TRUE)
               ->setLabel('Jumlah Input')
               ->setAttrib('size', '5')
               ->addValidator('NotEmpty')
               ->addErrorMessage('No Tidak Boleh Kosong');
           
           $submit  = new Zend_Form_Element_Submit('Go');
           $submit->setRequired(True);
           
           $this->addElements(array($no,$submit));
       
    }


}

