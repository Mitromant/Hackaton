<?php
session_start();
require_once 'Bd.php';
$comments = $_POST['comments'];
$stek = $_POST['stek'];
$name = $_POST['name'];
$contact = $_POST["contact"];
$login = $_SESSION['user']['login'];
$check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
 $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
if(mysqli_num_rows($check_project) > 0){
mysqli_query($connect, "UPDATE `project_manager` SET `comments` = '$comments' WHERE `project_manager`.`login` = $login");
mysqli_query($connect, "UPDATE `project_manager` SET  `stack`= '$stek' WHERE `project_manager`.`login` = $login");
mysqli_query($connect, "UPDATE `project_manager` SET `name` = '$name' WHERE `project_manager`.`login` = $login");
mysqli_query($connect, "UPDATE `project_manager` SET `contact` = '$contact' WHERE `project_manager`.`login` = $login");
header('Location:lk.php');}
else{
mysqli_query($connect, "UPDATE `soiscatel` SET `comments` = '$comments' WHERE `soiscatel`.`login` = $login");
mysqli_query($connect, "UPDATE `soiscatel` SET  `stack`= '$stek' WHERE `soiscatel`.`login` = $login");
mysqli_query($connect, "UPDATE `soiscatel` SET `name` = '$name' WHERE `soiscatel`.`login` = $login");
mysqli_query($connect, "UPDATE `soiscatel` SET `contact` = '$contact' WHERE `soiscatel`.`login` = $login");
header('Location:lk.php');
}
?>