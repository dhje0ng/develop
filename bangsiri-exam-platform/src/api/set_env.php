<?php

require_once __DIR__ . '/lib.php';

session_start();

if($_SESSION['user'] !== "admin"){
    die("<script>alert('접근 권한이 없습니다.'); location.href='../welcome.php'; </script>");
}

$status = $_POST['status'];

if($status == NULL){
    die("<script>alert('상태 설정값이 올바르지 않습니다.'); history.go(-1); </script>");
}

if(!update_status($status)){
    die("<script>alert('오류가 발생하였습니다.'); history.go(-1); </script>");
}

echo "<script>alert('대회 모드 수정이 완료되었습니다.'); history.go(-1); </script>";

?>