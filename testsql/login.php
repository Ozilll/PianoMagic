<!DOCTYPE html>
<?php
  session_start();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
    <script src="jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <label for="userName">Username:</label>
      <input type="text" name="userName" id="userName"/>
      <label for="userPass">Password:</label>
      <input type="password" name="userPass" id="userPass"/>
      <!-- <input type="submit" value="Login" name="smLogin"/> -->
      <input type="button" id="smLogin" value="Login" name="smLogin"/>
    </form>
    <div id="nhanVe"></div>
    <!-- <?php
      $user = $_POST["userName"];
      $pass = $_POST["userPass"];
      $conn = mysqli_connect('localhost','root','','music');
      $sql = "SELECT * FROM users WHERE userName = '$user' && userPass = '$pass'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)>0) {
        $_SESSION['username'] = $user;
        header("Location:index.php");
      } else {
        echo "belo";
      }
     ?> -->
     <!-- <script>
       function checkAjax(){
         var user = userName.value;
         var pass = userPass.value;

         var xhr = new XMLHttpRequest;
         // Goi giu lieu
         xhr.open('GET','checkLogin.php?userName = ' + user + '&&userPass = ' + pass, true);
         xhr.send();

         // Nhan ve
         xhr.onreadystatechange = function(){
           if (xhr.readyState == 4 && xhr.status == 200) {
             document.getElementById('nhanVe').innerHTML = xhr.responseText;
           }
         }
       }
     </script> -->
     <script type="text/javascript">
       $(document).ready(function(){
         // $.get("checkLogin.php",{userName:$('#userName').val(),userPass:$('#userPass').val()}, function(data){
         //   $("#nhanVe").text(data);  
         $.ajax({
           type:"POST",
           url:"checkLogin.php",
           data:{userName:$('#userName').val(),userPass:$('#userPass').val()},
           success:function(data){
             console.log(data);
           }
           error:function() {

           }
         }
       })
     </script>
  </body>
</html>
