<?php

class Application_Form_Multiedit extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setName('MultiDelete');
        $this->setMethod('post');
        $this->setAction('delete');
        
        
        $hapus = new Zend_Form_Element_MultiCheckbox();
        $hapus->setMultiOptions(array());
    }


}

