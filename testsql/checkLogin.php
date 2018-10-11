<?php
  // $user = $_POST["userName"];
  // $pass = $_POST["userPass"];
  // $conn = mysqli_connect('localhost','root','','music');
  // $sql = "SELECT * FROM users WHERE userName = '$user' && userPass = 'pass'";
  // $result = mysqli_query($conn, $sql);
  // if (mysqli_num_rows($result)>0) {
  //   echo "Succcessfully";
  // } else {
  //   echo "Failed";
  // }

  try{
    $conn = new PDO("mysql:host = localhost;dbname = music","root","");
    $stmt = $conn -> prepare("SELECT * FROM users WHERE userName=:user");
    $stmt->bindParam(':user',$user);
    $user=$_POST['userName'];
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
      echo $row['userName'];
    }
  }catch(PDOException $e){
    echo "Failed to connect".$e->getMessage();
  }
 ?>
