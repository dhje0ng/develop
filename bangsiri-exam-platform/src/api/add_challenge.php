<?php

require_once __DIR__ . '/lib.php';

session_start();

if($_SESSION['user'] !== "admin"){
    die("<script>alert('접근 권한이 없습니다.'); location.href='../welcome.php'; </script>");
}

$chall_name = $_POST['chall_name'];
$chall_content = $_POST['chall_content'];
$chall_category = $_POST['chall_category'];
$chall_link = $_POST['chall_link'];

if($chall_name == NULL || $chall_content == NULL || $chall_category == NULL || $chall_link == NULL){
    die("<script>alert('모든 빈칸을 입력해주세요.'); history.go(-1); </script>");
}

if(!add_challenge($chall_name, $chall_content, $chall_category, $chall_link)){
    die("<script>alert('오류가 발생하였습니다.'); history.go(-1); </script>");
}

echo "<script>alert('문제 등록이 완료되었습니다.'); history.go(-1); </script>";

?>