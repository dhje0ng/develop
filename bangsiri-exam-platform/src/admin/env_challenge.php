<?php

require_once __DIR__ . '../../api/lib.php';

require_once __DIR__ . '../../api/secure.php';

session_start();

if($_SESSION['user'] !== "admin"){
    die("<script>alert('접근 권한이 없습니다.'); location.href='../welcome.php'; </script>");
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title> B@NGSIRI </title>

  <!-- Custom fonts for this template-->
  <link href="../static/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../static/dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3"><img src="../static/images/bangsiri.png" width="25" height="25"/> ADMIN PANEL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href='../welcome.php'>
          <i class="fas fa-home"></i>
          <span>홈</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        SideBar
      </div>

      <!-- Nav Item - NOTICE -->
      <li class="nav-item">
        <a class="nav-link" href="env_set.php">
          <i class="far fa-envelope"></i>
          <span>대회 관리</span></a>
      </li>

      <!-- Nav Item - NOTICE -->
      <li class="nav-item">
        <a class="nav-link" href="env_notice.php">
          <i class="far fa-envelope"></i>
          <span>공지사항 관리</span></a>
      </li>

      <!-- Nav Item - ENV -->
      <li class="nav-item active">
        <a class="nav-link" href="env_challenge.php">
          <i class="fas fa-pen-alt"></i>
          <span>문제 관리</span></a>
      </li>

      <!-- Nav Item - USERS -->
      <li class="nav-item">
        <a class="nav-link" href="env_users.php">
          <i class="fas fa-user-alt"></i>
          <span>사용자 관리</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">문제 관리</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12 mb-8">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">문제 등록</h6>
                </div>
                <div class="card-body">
                <form action="/api/add_challenge.php" method="post">
                <select name="chall_category" class="form-control">
                    <option>분야를 선택해주세요.</option>
                    <option value="c">C언어</option>
                    <option value="python">Python</option>
                </select><br>
                <input type="text" name="chall_name" class="form-control" placeholder="문제 명" required><br>
                <input type="text" name="chall_content" class="form-control" placeholder="문제 설명(기본 설명)" required><br>
                <input type="text" name="chall_link" class="form-control" placeholder="문제 파일(구글 드라이브 링크)" required><br>
                <button type="submit" class="btn btn-primary btn-sm"> 등록 </button>
                </form>
                </div>
              </div>
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">문제 관리</h6>
                </div>
                <div class="card-body">
                    <?php
                    $challenge = get_challenge();
                    while($row = mysqli_fetch_array($challenge)){?>
                    <form action="/api/del_challenge.php" method="post">
                    문제 명 : <?php echo xss_secure($row['ch_name']); ?><br>
                    <input type="hidden" name="idx" value=<?php echo $row['idx'];?>>
                    <button type="submit" class="btn btn-danger btn-sm"> 삭제 </button> <hr>
                    </form>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2021 B@NGSIRI | dev, jhyeon@kakao.com </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../static/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="../static/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../static/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../static/dashboard/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../static/dashboard/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../static/dashboard/js/demo/chart-area-demo.js"></script>
  <script src="../static/dashboard/js/demo/chart-pie-demo.js"></script>

</body>
</html>