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
while ($row = mysqli_fetch_assoc($result)){
  echo '<h3>Ma the loai: ' . $row['ma_tloai'] . '</h3>';
  echo '<h3>Ten the loai: ' . $row['ten_tloai'] . '</h3>';

}
?>
