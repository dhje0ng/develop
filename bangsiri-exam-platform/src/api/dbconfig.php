<?php
define("HOST", "172.4.0.3");
define("USER", "bangsiriadm");
define("PASSWORD", "b@ngsiri2021!@#");
define("DB", "bangsiriexam");

$db = mysqli_connect(HOST, USER, PASSWORD, DB);

if(!$db){
    die("DB Connection Error");
}

?>