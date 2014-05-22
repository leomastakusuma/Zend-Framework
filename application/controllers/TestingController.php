<?php
/*
 * save-edited-gos.php to new gos data
 */
require_once 'controllers/user/access.inc.php';
// if($UserInfo['priv'] !== 'ho') redirect ('/profile/myprofile');
// if(empty($gos_id)) redirect ('/account/gos');

if (! empty($_SESSION['form-gos-edit'])) {
   extract($_SESSION['form-gos-edit']);

    $reg = $_SESSION['form-gos-edit'];
   
    if (empty($name) || empty($owner) || empty($address) || empty($phone) ||
             empty($email) || empty($npwp) || empty($valid_start) ||
             empty($valid_end) || empty($sales_target) || empty($komdom) ||
             empty($komint)) {
        $_SESSION['form-gos-edit']['warning'] = "Kolom bertanda *, tidak boleh kosong!";
        redirect('/account/gos-edit/' . $gos_id);
    }
    
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    if (empty($email)) {
        $_SESSION['form-gos-edit']['warning'] = "Format email yang anda masukkan salah!";
        redirect('/account/gos-edit/' . $gos_id);
    }
    
    $agent = loadModel('Agent');
    if (! empty($gos_id)) {
        $email = trim($email);
        
        $format = array(
        		"string" => array(
        				"pattern" => "/^([a-zA-Z]+){3,24}$/",
        				"caption_id" => "Format %s tidak valid. (Harus alphabet, minimal karakter = 3, maksimal karakter = 24)",
        				"caption_en" => "Invalid format %s."
        		),
        		"phone" => array(
        				"pattern" => "/^([0-9]+){9}$/",
        				"caption_id" => "Format %s tidak valid. (Harus angka dan minimal karakter = 9)",
        				"caption_en" => "Invalid format %s."
        		),
        		"int" => array(
        				"pattern" => "/^([0-9]+)$/",
        				"caption_id" => "<strong>Format %s tidak valid. (Harus angka)",
        				"caption_en" => "Invalid format %s."
        		),
        		"email" => array(
        				"pattern" => "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD",
        				"caption_id" => "Format %s tidak valid.",
        				"caption_en" => "Invalid format %s."
        		),
        		"npwp" => array(
        				"pattern" => "/^([0-9]{2})([.])([0-9]{3})([.])([0-9]{3})([.])([0-9]{1})-([0-9]{3})([.])([0-9]{3})$/",
        				"caption_id" => "Format %s tidak valid.",
        				"caption_en" => "Invalid format %s."
        		),
        		"category" => array(
        				"pattern" => "/^([a-zA-Z.]+){2,24}$/",
        				"caption_id" => "%s",
        				"caption_en" => "%s"
        		)
        );
        $fields = array(
                'userid' => $userid,
                'agentcode' => $agentcode,
                'name' => $name,
                'address' => $address,
                'phoneno' => $phone,
                'handphone' => $handphone,
                'faxno' => $fax,
                'pic' => $owner,
                'npwp' => $npwp,
                'SalesTgt' => $sales_target,
                'berlaku' => $valid_start,
                'akhir' => $valid_end,
                'komdom' => $komdom,
                'komint' => $komint,
                'disc_rate' => $disc_rate,
                'pkp' => $pkp,
                'pph' => $pph,
                'modified_by' => $UserInfo['username'],
                'email' => $email,
                'BO' => $BO
        );
      //cek eroor
        $valid_format = true;
        $valid_format_messages = array();
        $message = "Kolom bertanda *, tidak boleh kosong! <ul>%s</ul>";
        if(isset($fields))
        {
            echo '<pre>';
            pr($reg);
        }
        exit;
       
       
        
        if (! empty($pic_nametitle)) {
            $fields['pic_nametitle'] = $pic_nametitle;
        }
        if (! empty($pic_firstname)) {
            $fields['pic_firstname'] = $pic_firstname;
        }
        if (! empty($pic_middlename)) {
            $fields['pic_middlename'] = $pic_middlename;
        }
        if (! empty($pic_lastname)) {
            $fields['pic_lastname'] = $pic_lastname;
        }
        // pr($fields); exit;
        $check_tourcode = $agent->findByCode($userid);
        // echo $gos_id;
        // pr($check_tourcode); exit;
        if (! empty($check_tourcode) && $check_tourcode['id'] != $gos_id) {
            $agent->setCodeAsUsed($userid);
            $_SESSION['form-gos-edit']['warning'] = "User ID {$userid} sudah dipakai oleh GOS Member yang lain.";
            redirect('/account/gos-edit/' . $gos_id);
            exit();
        }
        if (! $agent->update($fields, 'id =' . $gos_id)) {
            $_SESSION['form-gos-edit']['warning'] = "Maaf telah terjadi masalah teknis di system kami, harap tunggu beberapa saat lagi.";
            redirect('/account/gos-edit/' . $gos_id);
        } else {
            $agent->updateUserEmail($userid, $email);
            $agent->setCodeAsUsed($userid);
            $_SESSION['form-gos-edit']['success'] = "Data telah diupdate.";
            redirect('/account/gos-edit/' . $gos_id);
        }
    } else {
        unset($_SESSION['form-gos-edit']);
        redirect('/account/gos/');
    }
}
