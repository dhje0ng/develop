<?php

require_once __DIR__ . '/lib.php';

session_start();

if($_SESSION['user'] !== "admin"){
    die("<script>alert('접근 권한이 없습니다.'); location.href='../welcome.php'; </script>");
}

$title = $_POST['title'];
$time = date('Y-m-d H:i:s');

if($title == NULL){
    die("<script>alert('모든 빈칸을 입력해주세요.'); history.go(-1); </script>");
}

if(!add_notice($title, $time)){
    die("<script>alert('오류가 발생하였습니다.'); history.go(-1); </script>");
}

echo "<script>alert('공지사항 등록이 완료되었습니다.'); history.go(-1); </script>";

?>