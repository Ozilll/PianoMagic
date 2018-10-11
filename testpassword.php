<?php
// $password = "12345";
// $options = array("cost" => 10, "salt" => uniqid());
// $hash = password_hash($password, PASSWORD_BCRYPT);
// echo $hash;
// mail("ductm62@gmail.com", "Hello thầy", "Phùng Thị Thu Hà");
?>
<?php
//Chèn vào dữ liệu
// mysql_query("INSERT INTO users(username,password, salt) VALUES($username, $hash, " . $options['salt']);

//Xác minh Mật khẩu
// $row = mysql_fetch_assoc(mysql_query("SELECT salt FROM users WHERE id=$userid"));
// $salt = $row["salt"];
// $hash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 10, "salt" => $salt));
//
// if (password_verify($password, $hash) {
//     // Verified
// }

         // $password='abcabc@123';
         // function generate_token() {
         //     return md5(microtime().mt_rand());
         // }
         //
         // $options = [
         //     'salt' => generate_token(), //write your own code to generate a suitable salt
         //     'cost' => 12 // the default cost is 10
         // ];
         // $hash = password_hash($password, PASSWORD_DEFAULT, $options);
         // echo $hash;
         //
         // //Kiem chung Password
         // if (password_verify('abcabc@123', $hash)) {
         //     echo 'Success!';
         // }
         // else {
         //     echo 'Invalid credentials';
         // }
?>
