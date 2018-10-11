<?php

  $con = mysqli_connect('localhost', 'root', '', 'diplomasystem');


  function escape($string){
    global $con;
    mysqli_real_escape_string($con, $string);
  }

  function query($query){
    global $con;
    mysqli_query($con, $query);
  }

function confirmm($result){
  global $con;
  if (!$result) {
    die("Query failed" . mysqli_error($con));
  }
}

  function fetch_array($result){
    global $con;
    mysqli_fetch_array($result);
  }
?>
