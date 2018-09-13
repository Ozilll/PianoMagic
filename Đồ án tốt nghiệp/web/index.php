<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quản lý đồ án tốt nghiệp</title>
    <link rel="stylesheet" href="css/doan.css"/>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.css"/>
  </head>
  <body class="login-img">
    <div class="row-fluid">
      <div class="span6"></div>
      <div class="span6">
        <div class="menu-login">
          <a class="bar-menu-login" href="#">Trang chủ</a>
          <a class="bar-menu-login" href="#">Đăng nhập</a>
          <a class="bar-menu-login" href="#">Hỏi đáp</a>
          <a class="bar-menu-login" href="#">Trợ giúp</a>
        </div>
      </div>
      <div>
        <form class="form-login" action="index.html" method="post">
          <div class="content-form">
            <img src="img/logo.png" alt="" class="logo-login">
            <h3>QUẢN LÝ ĐỒ ÁN TỐT NGHIỆP</h3>
            <hr>
            <div class="title-login">ĐĂNG NHẬP</div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Tài khoản" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <a href="" class="button-signup">Đăng ký</a>
          </div>
        </form>
      </div>
      <?php
          $servername = 'localhost';
          $username = 'root';
          $password = '';
          $db = 'music';

          // 1.Ket noi server
          $conn = mysqli_connect($servername, $username, $password, $db);

          // 2.Kiem tra trang thai ket noi
          if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
          }
      ?>
    </div>
  </body>
</html>
