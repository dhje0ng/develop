<?php

require_once __DIR__ . '/lib.php';

$num = $_POST['num'];
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$time = date('Y-m-d H:i:s');
$is_admin = 'N';

if($num == NULL || $name == NULL || $username == NULL || $password == NULL || $password2 == NULL){
    die("<script>alert('모든 빈칸을 입력해주세요.'); history.go(-1); </script>");
}

if(!preg_match("/[0-9]/", $num)){
    die("<script>alert('학번은 숫자만 입력가능합니다.'); history.go(-1); </script>");
}

if(!preg_match("/[A-Za-z0-9]/i", $username)){
    die("<script>alert('아이디는 영문 및 숫자만 입력 가능합니다.'); history.go(-1); </script>");
}

if($password != $password2){
    die("<script>alert('입력한 비밀번호가 서로 다릅니다.'); history.go(-1); </script>");
}

if(!register($num, $name, $username, $password, $time, $is_admin)){
    die("<script>alert('오류가 발생하였습니다.'); history.go(-1); </script>");
}

echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../index.php'; </script>";

?>