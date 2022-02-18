<?php

require_once __DIR__ . '/lib.php';

session_start();

if($_SESSION['user'] !== "admin"){
    die("<script>alert('접근 권한이 없습니다.'); location.href='../welcome.php'; </script>");
}

$idx = $_POST['idx'];

if(!preg_match("/[0-9]/i", $idx)){
    die("<script>alert('문제 번호는 숫자만 입력할 수 있습니다.'); history.go(-1); </script>");
}

if($idx == NULL){
    die("<script>alert('문제를 불러올 수 없습니다.'); history.go(-1); </script>");
}

if(!del_challenge($idx)){
    die("<script>alert('오류가 발생하였습니다.'); history.go(-1); </script>");
}

echo "<script>alert('문제 삭제가 완료되었습니다.'); history.go(-1); </script>";

?>