<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <label for="authorID">Author ID:</label>
      <input type="text" name="authorID" id="authorID"/>

      <label for="authorName">Author name:</label>
      <input type="text" name="authorName" id="authorID">

      <label for="authorAvatar">Author avatar: </label>
      <input type="text" name="authorAvatar" id="authorAvatar">

      <button type="button" name="button">Submit</button>
    </form>
    <?php
      // if (isset($_POST)) {
      //   // code...
      //   if (isset($_POST['authorID']&& isset($_POST('authorName'))&& isset($_POST))) {
      //     // code...
      //     $authorID = addslashes($_POST('authorID'));
      //     $authorName = addslashes($_POST('authorName'));
      //     $authorAvatar = addslashes($_POST('authorAvatar'));
      //
      //     // 1. Khai bao tham so ket noi
      //     $host = 'localhost';
      //     $username = 'root';
      //     $password = '';
      //     $db = 'music';
      //
      //     // 2. Ket noi Server
      //     $conn = mysqli_connect($host, $username, $password, $db);
      //     if(!$conn){
      //       die('khong the ket noi: ' . mysqli_connect_error());
      //     }
      //
      //     // 3. Truy van
      //     $sql = "INSERT INTO tacgia VALUE('$authorID','$authorName','$authorAvatar')";
      //     if (mysqli_query($conn, $sql) == TRUE) {
      //       // code...
      //       echo '1 ban duoc ghi them';
      //     }else {
      //       echo 'khong the chen giu lieu' . mysqli_error($conn);
      //     }
      //
      //     // 4. Dong ket noi
      //     mysqli_close($conn);
      //   }
      // }
     ?>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'music';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // Database query
    $sql = "SELECT * FROM theloai";
    $result = mysqli_query($conn, $sql);

    // Result
    echo '<table border = "1" width = "800">';
    echo '<tr><th>Mã thể loại</th><th>Tên thể loại</th></tr>';
    while ($row = mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<h3>Ma the loai: ' . $row['ma_tloai'] . '</h3>';
      echo '<h3>Ten the loai: ' . $row['ten_tloai'] . '</h3>';
      echo '<td><a href="deleteAuthor.php?id='.$row['ma_tgia'].'">Xoa</a></td>';
      echo '</tr>';
    }
    ?>
  </body>
</html>
