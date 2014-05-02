<?php

class BookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $data = array ("nama"=>array("Leo","Masta","Kusuma"),
                       "alamat"=>array("Lampung","Jakarta","Jerman")
                        );
                        echo '<pre>';
                   
                        
                        foreach ($data as $nama)
                        {     
                            print_r($nama);
//                            echo 'Nama  : '.$nama.'<br>';
                        }
                        
                        foreach ($data['alamat'] as $alamat)
                        {
                            echo 'Alamat : '.$alamat.'<br>';
                        }
                       
                        
                        
                        
                        
                        
                        
//        for($a=1;$a < count($data);$a++ )
//        {
//            $a= $data['nama'.$a];
//        }
//        
//        print_r($a);
        
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }


}







