<?php
  session_start();
 ?>
<?php
  if (isset($_SESSION['username'])) {
    echo 'Welcome' .$_SESSION['username'];
    echo '<br><a href="logout.php">LOGOUT</a>';
  } else {
    echo 'Khong ton tai Session';
  }
 ?>
