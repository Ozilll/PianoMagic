
<?php
// $a = array();
// for ($i = 1; $i < 10; $i++) {
//  $a[$i] = $i;
// }
// echo "<prep>";
// print_r($a);
// echo "</prep>";

// 4_5.php
// $a = array(1 => 15, 10 => 20);
// for ($i = 1; $i < 10; $i++) {
//  $a[$i] = $i;
// }
// print_r($a);
// 4_6.php
// $a = range(1, 9);
// print_r($a);

// $a1 = array('a', 'b');
// $a2 = array('c', 'd');
// $b1 = $a1 + $a2;
// $b2 = $a2 + $a1;
// $c1 = array_merge($a1, $a2);
// $c2 = array_merge($a2, $a1);
// print_r($b1);

// 4_9.php
// $a1 = array('x' => 'a', 'y' => 'b');
// $a2 = array('x' => 'c', 'y' => 'd');
// $b1 = $a1 + $a2;
// $b2 = $a2 + $a1;
// $c1 = array_merge($a1, $a2);
// $c2 = array_merge($a2, $a1);
// print_r($b1);
// print_r($b2);
// print_r($c1);
// print_r($c2);

// 4_12.php
// $con = mysqli_connect('localhost', 'root', '', 'samples');
// $rs = mysqli_query($con, "select * from person");
// if ($rs) {
//  $persons = array();
//  while($row = mysqli_fetch_assoc($rs)) {
//  $persons[] = $row;
//  }
//  mysqli_free_result($rs);
// }
// mysqli_close($con);
// echo ("<pre>");
// print_r($persons);
// echo ("</pre>");

// 4_13.php
// $con = mysqli_connect("localhost", "root", "", "samples");
// $rs = mysqli_query($con, "select * from person");
// if ($rs) {
//  $persons = array();
//  while($row = mysqli_fetch_assoc($rs)) {
//  $persons[] = $row;
//  }
//  mysqli_free_result($rs);
// }
// mysqli_close($con);
// for ($i = 0; $i < sizeof($persons); $i++) {
//   echo "<pre>";
//  echo "{$persons[$i]['first_name']} {$persons[$i]['last_name']} " .
//  gmdate("M j Y", $persons[$i]['date_of_birth']) . "\n";
//  echo "</pre>";
// }

// 4_14.php
// $con = mysqli_connect("localhost", "root", "", "samples");
// $rs = mysqli_query($con, "select * from person");
// if ($rs) {
//  $persons = array();
//  while($row = mysqli_fetch_assoc($rs)) {
//  $persons[] = $row;
//  }
//  mysqli_free_result($rs);
// }
// mysqli_close($con);
// reset($persons);
// while ($person = each($persons)) {
//   echo("<pre>");
//  echo "{$person['value']['first_name']} {$person['value']['last_name']} " .
//  gmdate("M j Y", $person['value']['date_of_birth']) . "\n";
//  echo("</pre>");


// $f = '';
// $fp = fopen('result/HNUE_Ketqua_SPK8T1_sp5a025_2017-01-17_18-33-00_19.txt', 'r');
// if ($fp) {
//  while ($s = fread($fp, 100)) {
//  $f .= $s;
//  }
//  fclose($fp);
// }
// echo("<pre>");
// var_dump($f);
// echo("</pre>");
//
// $dir = 'result';
// $files = scandir($dir,1);
// echo("<pre>");
// print_r($files);
// echo("</pre>");

// 7_26.php
$pattern = "result/*.txt";
$files = glob($pattern);
foreach ($files as $file) {
  $str = trim($file, "result");
  echo("<pre>");
 echo $str;
 echo("</pre>");
 if (is_dir($file)) {
 echo "/";
 }
 echo "\n";
}

// 7_27.php
// $dir = dir(".");
// while (($file = $dir->read()) !== false) {
//  echo $file;
//  if (is_dir($file)) {
//  echo "/";
//  }
//  echo "\n";
// }
// $dir->close();
 ?>
