<?php

class MultiselectController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form   = new Application_Form_Multiselect();
        $this->view->form = $form;
        
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->_request->getPost()))
            {   $values     = $form->getValues();
                $mul        = $values['hobby'];
                print_r($mul);
                /*
                $hoby       = new Application_Model_DbTable_Multi();
                $hoby->insertHobi($mul);
                
                
                //$multi      = $this->getRequest()->getParam('hobby');
                
//                $nama       = $this->getRequest()->getParam('nama');
//                        
//                $this->view->nama  = $nama;
                 * 
                 */
                
               
            }
            
        }
        
        
    }


}

