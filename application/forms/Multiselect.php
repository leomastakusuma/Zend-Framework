<?php

class Application_Form_Multiselect extends Zend_Form
{

    public function init()
    {
        $this->setName('multiselect');
        $this->setMethod('post');
             
        
        $multi  = new Zend_Form_Element_MultiCheckbox('hobby');
        $multi->setMultiOptions(array
                                    ( //option value => option label
                                      'Renang' => 'Renang',
                                      'Makan'  => 'Makan'
                                    )
                                )
              ->setLabel('Hobby');
        $nama   = new Zend_Form_Element_Text('nama');
        $nama->setLabel('nama');
        $submit = new Zend_Form_Element_Submit('simpan');
        $submit->setLabel('Simpan');
        
        $this->addElements(array($multi,$nama,$submit));
    }


}

