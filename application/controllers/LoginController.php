<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
       
    }

    public function indexAction()
    {
               
    }

    private function getAutAdapter()
    {
        $authadapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authadapter->setTableName('user')
                    ->setIdentityColumn('user')
                    ->setCredentialColumn('password');
        
            return $authadapter;
                    
    }

    public function logoutAction()
    {
        // action body
        Zend_Auth::getInstance()->clearIdentity();
        
        $this->_redirect('Login/login');
    }

    public function loginAction()
    {
        // action body
       if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->_redirect('Mahasiswa/index');
        }
      
        else {
            
          
        $request = $this->getRequest();
        $form = new Application_Form_Login();
        
        if ($request->isPost())
        {
                    if($form->isValid($this->_request->getPost()))
                    {
                        $authadapter = $this->getAutAdapter();

                        $username =$form->getValue('username');
                        $password =$form->getValue('password');
//                        $username = 'ommasta';
//                        $password = 'masta123';
                                              
                        $authadapter->setIdentity($username)
                                    ->setCredential($password);
                        $auth = Zend_Auth::getInstance();
                        $result = $auth->authenticate($authadapter);

                                if ($result->isValid())
                                {
                                    $indentify   = $authadapter->getResultRowObject();
                                    $authStorage = $auth->getStorage();

                                    $authStorage->write($indentify);

                                    $this->_redirect('Mahasiswa/index');

                                }

                                else
                                {
                                    $this->view->errorMessage = 'Username or Password is Wrong';
                                }
                    }                    
        }
       
        $this->view->formlogin=$form;
        } 
        
        
    }        
    


}





