<?php
session_start();
require_once 'Bd.php';
$id = preg_replace("/[^0-9\-]/","",$_POST["id"]);
$login = $_SESSION['user']['login'];
$user_id = $_SESSION['user']['id'];
$check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
$check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
if (mysqli_num_rows($check_soiscatel) > 0){
    mysqli_query($connect,"INSERT INTO `likes`(`like_id`, `soiscatel_id`, `project_id`, `soiscatel_like_status`, `project_like_status`) VALUES (NULL,'$user_id','$id','1','0')");
}
else{
    mysqli_query($connect,"INSERT INTO `likes`(`like_id`, `soiscatel_id`, `project_id`, `soiscatel_like_status`, `project_like_status`) VALUES (NULL,'$id','$user_id','0','1')");
}
header('Location: index.php');
?>

