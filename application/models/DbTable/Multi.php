<?php

class Application_Model_DbTable_Multi extends Zend_Db_Table_Abstract
{

    protected $_name = 'hobi';

      
    public function insertHobi($hobies)
    {   
        /*  menyimpan berulang
            foreach ($hobies as $hobi) {
            $data = array('hobi'=>$hobi);
            //print_r($data);die;
            $this->insert($data);
        }
         */
        $data ='';
        foreach ($hobies as $idx=>$hobi)
        {
            if($idx > 0) 
            {
                $data .= ',';
            }
                $data .= $hobi;
        }
        $dataa = array('hobi'=>$data);
        $this->insert($dataa);
           
    }
    
   public function insertNama($nama)
    {   
            
//         //print_r($nama);die;
//            foreach ($nama as $row)
//            {
                //$data = array('hobi'=> $nama);
                //print_r($data);
               // $this->insert($nama);
                        
                        
            }
        
//    }

}

