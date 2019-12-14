<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
$data = null;

$execute = true;
    
/*Variable Post*/
if(!empty($_POST["first_name"])){
    $first_name = mysqli_real_escape_string($link,$_POST["first_name"]);
}else{
    $execute = false;
}
if(!empty($_POST["last_name"])){
    $last_name = mysqli_real_escape_string($link,$_POST["last_name"]);
}else{
    $execute = false;
}
if(!empty($_POST["email"])){
    $email = mysqli_real_escape_string($link,$_POST["email"]);
}else{
    $execute = false;
}
if(!empty($_POST["phone_number"])){
    $phone_number = mysqli_real_escape_string($link,$_POST["phone_number"]);
}else{
    $execute = false;
}
if(!empty($_POST["gender"])){
    $gender = mysqli_real_escape_string($link,$_POST["gender"]);
}
if(!empty($_POST["date_of_birth"])){
    $date_of_birth = mysqli_real_escape_string($link,$_POST["date_of_birth"]);
}
/*End Variable Post*/

if($execute){
    $sql_insert_detail = "insert into ms_user (
                               first_name,
                               last_name,
                               email,";
      if(!empty($gender)){
        $sql_insert_detail .= "gender,";
      }
      if(!empty($date_of_birth)){
        $sql_insert_detail .= "date_of_birth,";
      }
        $sql_insert_detail .= "phone_number
                           )
                    values (
                               '$first_name',
                               '$last_name',
                               '$email',";
      if(!empty($gender)){
        $sql_insert_detail .= "'$gender',";
      }
      if(!empty($date_of_birth)){
        $sql_insert_detail .= "'$date_of_birth',";
      }
        $sql_insert_detail .= "'$phone_number'
                           );
                         ";
    $result = mysqli_query($link, $sql_insert_detail);  

    if($result){
        $last_id = mysqli_insert_id($link);   
        $data["result"] = true;
        $data["last_id"] = $last_id;
    }else{
        $data["result"] = false;
        $data["sql_warning"] = mysqli_error($link);
    }
}else{
    $json["status"] = "ERROR";
    $json["error_msg_id"] = "Tidak dapat melakukan tindakan ini";
    $json["error_msg_en"] = "Cannot do this action";
    /*for local test purpose*/
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Headers: Origin, Accept, Accept-  Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, X-Response-Time, X-PINGOTHER, X-CSRF-Token,Authorization');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    /*end for local test purpose*/
    header('Content-Type: application/json');
    $json["request_data"] = $_POST;
    $json["request_url"] = $action;
    echo json_encode($json,JSON_PRETTY_PRINT);
    exit();
}