<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
$data = null;

$execute = true;

/*Variable Post*/
if(!empty($_POST["email"])){
    $email = mysqli_real_escape_string($link,$_POST["email"]);
}else{
    $execute = false;
}
/*End Variable Post*/

if($execute){
    $sql = "select 
            ms_u.*
          from 
            ms_user ms_u
          where 
            ms_u.email = '$email'
           and
            ms_u.archived='0' ";
    
    $query=mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($query);
    if ($count>0) {
        $data["email_count"] = $count;
    } else {
        $data["email_count"] = $count;
    }
}else{
    $json["status"] = "ERROR";
    $json["error_msg_id"] = "Tidak dapat melakukan tindakan ini";
    $json["error_msg_en"] = "Cannot do this action";
    header('Content-Type: application/json');
    echo json_encode($json,JSON_PRETTY_PRINT);
    exit();
}