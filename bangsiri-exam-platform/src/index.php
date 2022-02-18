<?php
session_start();

if(isset($_SESSION['user'])){
	echo("<script>alert('이미 로그인 중인 사용자입니다.'); location.href='welcome.php'; </script>");
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title> B@NGSIRI </title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
<body class="img js-fullheight" style="background-image: url(static/images/bangsiribg.jpeg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">B@NGSIRI</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-5">
					<div class="login-wrap p-0">
		      	<form action="api/signin.php" method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control" placeholder="아이디를 입력해주세요.(ex, test)" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="비밀번호를 입력해주세요." required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
				<p class="w-110 text-center">&mdash; 계정이 없으신가요? <a href="register.php"> 여기를 클릭해 가입하세요! </a> &mdash;</p>
	          </form>
	          <p class="w-110 text-center">&mdash; 해당 브라우저는 Chrome 브라우저에 최적화 되어있습니다. &mdash;</p>
              <p class="w-110 text-center">&copy; Copyright 2021 B@ngsiri | Dev, stjhyeon@kakao.com </p>
		      </div>
				</div>
			</div>
		</div>
	</section>
</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/popper.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/main.js"></script>
</html>