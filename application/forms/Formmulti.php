<?php

class Application_Form_Formmulti extends Zend_Form
{

    public function init()
    {
        $this->setName('Multi Insert');
        $this->setMethod('Post');
        $this->setAction('Multiinsert/insert');
               
        $subForm = new Zend_Form_SubForm();
//        $subForm->setAttrib('size', '5');
        $this->addSubForm($subForm, 'nama');
       
        $simpan = new Zend_Form_Element_Submit('Simpan');
        $simpan->setLabel('Submit')
                ->setRequired(True);
 
       
       
        $this->addElement($simpan);
                
        
        
        
       /*
        * data = array(
        *   [NAMA] => array, [a,c,d]
        *   [jenkel] => array [l,p,l],
        * )
        */
        
       
        
    }


}

