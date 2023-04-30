<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: lk.php');
}
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->

<style>
    form {
    display: block;
    margin-top: 12%;
    margin-right: auto;
    margin-left: auto;
    width: 22%;
    }
    body {
      background-image: url("back.jpg");
      background-repeat: no-repeat;
      background-size: cover;

    }
.wrapper{
  position: relative;
  width: 400px;
  height: 440px;
  background: transparent;
  border: 2px solid rgba(255,255,255,.5);
  border-radius: 20px;
  backdrop-filter: blur(20px);
  box-shadow: 0 0 30px rgba(0, 0, 0, .5);

}
.wrapper.label {
  position: absolute;
  top: 50%;
  left: 5px;
}
</style>
  </head>


<body style="background-color: rgb(240, 240, 240)" class="text-center">    
<main>
  <form  method="post">
<br><br>
<div class="wrapper">
    <h1 class="h3 mb-3 fw-normal mt-4" style=" font-family: Arial; color: #F0FFFF;">Авторизация</h1><br>
    <div class="form-floating">
      <div style="margin-right:10px; font-family: Arial; color: #F0FFFF;"><label for="floatingInput" >Логин</label></div>
      <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="login" id="floatingInput" placeholder="Введите логин">
      
    </div>
    <div class="form-floating">
    <div style="margin-right:10px; margin-top: 15px; font-family: Arial; color: #F0FFFF;"><label for="floatingPassword">Пароль</label></div>
      <input type="password" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" id="floatingPassword" name="password" placeholder="Пароль">
      
    </div>
    <div style="margin-top: 15px;"><button class="w-80 mt-2 btn btn-lg btn-primary" type="submit">Войти</button></div>
    <div style="margin-top: 15px;"><a href="Registr.php"><a href="Registr.php"><button class="w-120 mt-2 btn btn-secondary"   type="submit">Зарегистрироваться</button></div></a>
  </div>    
  </form>
  <div style="margin-right: -40px" class="py-5 text-center ">
        <a href="index.php">Назад</a>
  </div>

  <?php
 ini_set('display_errors','Off');
  include ("Bd.php");
  
  $login = $_POST['login'];
  $password = $_POST['password'];
  $password = md5($password);
  $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login' AND `password` = '$password'");
  $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login' AND `password` = '$password'");
  if (mysqli_num_rows($check_soiscatel) > 0){
  $user = mysqli_fetch_assoc($check_soiscatel);
  $_SESSION['user'] =[
    "id" => $user['soiscatel_id'],
    "name" => $user['name'],
    "login" => $user['login']
  ];
  header('Location: lk.php');
  echo $_SESSION['user']['id'];
  }
  elseif(mysqli_num_rows($check_project) > 0){
    $user = mysqli_fetch_assoc($check_project);
  $_SESSION['user'] =[
    "id" => $user['project_id'],
    "name" => $user['name'],
    "login" => $user['login']

  ];
  header('Location: lk.php');
  echo $_SESSION['user']['id'];
  }
  /* else {
    echo 'Логин или пароль неверный';
  } */
  ?>
</main>    
  </body>
</html>