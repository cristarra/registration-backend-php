<?php

//* Config */
require_once 'include/config.php';
/* End Config */

$json = array();
$action = basename($_SERVER['REQUEST_URI']);

if(!empty($action)){

    if($action=="user_check_email"){

        require_once './user/user_check_email.php';

    }else if($action=="user_check_phone_number"){

        require_once './user/user_check_phone_number.php';

    }else if($action=="user_add"){

        require_once './user/user_add.php';

    }else{
        $json["status"] = "ERROR";
        $json["error_msg_id"] = "Tidak dapat melakukan tindakan ini";
        $json["error_msg_en"] = "Cannot do this action";
    }

    /* Data */

    if(!empty($data)){
        $json["status"] = "SUCCESS";
        $json["data"] = $data;
    }else{
        $json["status"] = "ERROR";
        $json["error_msg_id"] = "Kami tidak dapat menemukan data dari server saat ini";
        $json["error_msg_en"] = "We cannot find data from the server at this time";
    }

    /* End Data*/

}else{
    $json["status"] = "ERROR";
    $json["error_msg_id"] = "Tidak dapat melakukan tindakan ini";
    $json["error_msg_en"] = "Cannot do this action";
}

/*for local test purpose*/
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Headers: Origin, Accept, Accept-  Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, X-Response-Time, X-PINGOTHER, X-CSRF-Token,Authorization');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
/*end for local test purpose*/
header('Content-Type: application/json');
$json["request_data"] = $_POST;
$json["request_url"] = $action;
echo json_encode($json,JSON_PRETTY_PRINT);

require_once 'include/close.php';