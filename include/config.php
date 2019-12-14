<?php
error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}
session_start();

require_once 'db.php';

function printr($array){
    echo"<pre>";
    print_r($array);
    echo"</pre>";
}