<?php

require_once __DIR__ . '/lib.php';

session_start();

$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

if($username == NULL || $password == NULL){
    die("<script>alert('모든 빈칸을 입력해주세요.'); history.go(-1); </script>");
}

if(!preg_match("/[A-Za-z0-9]/i", $username)){
    die("<script>alert('아이디는 영문 및 숫자만 입력 가능합니다.'); history.go(-1); </script>");
}

$result = login($username, $password);

if(!$result){
    die("<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.'); history.go(-1); </script>");
}

$_SESSION['user'] = $result['username'];

echo "<script>alert('$username 님 환영합니다'); location.href='../welcome.php'; </script>";

?>