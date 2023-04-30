<?php
$connect = mysqli_connect('localhost', 'root', '','arbuz');
function get_soiscatel(){
    global $connect;
    $stat = mysqli_query($connect, "SELECT * FROM `soiscatel`");
    return $stat;
  }
  function get_project(){
    global $connect;
    $stat = mysqli_query($connect, "SELECT * FROM `project_manager`");
    return $stat;
  }
  function get_like(){
    global $connect;
    $stat = mysqli_query($connect, "SELECT * FROM `likes`");
    return $stat;
  }
?>