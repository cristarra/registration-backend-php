<?php

//* Config */
require_once 'include/config.php';
/* End Config */

$json = array();
            
if(!empty($_GET["action"])){

    if($_GET["action"]=="user_check_email"){

        require_once './user/user_check_email.php';

    }else if($_GET["action"]=="user_check_phone_number"){

        require_once './user/user_check_phone_number.php';

    }else if($_GET["action"]=="user_add"){

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

header('Content-Type: application/json');
echo json_encode($json,JSON_PRETTY_PRINT);

require_once 'include/close.php';