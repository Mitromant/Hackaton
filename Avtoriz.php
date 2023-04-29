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


</style>
  </head>


<body style="background-color: rgb(240, 240, 240)" class="text-center">    
<main>
  <form  method="post">
<br><br>

    <h1 class="h3 mb-3 fw-normal">Авторизация</h1><br>
    <div class="form-floating">
      <input type="text" class="form-control" name="login" id="floatingInput" placeholder="Введите логин">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="w-100 mt-2 btn btn-lg btn-primary" type="submit">Войти</button>
    <button class="w-120 mt-2 btn btn-secondary"   type="submit"><a href="Registr.php">Зарегистрироваться</a></button>
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
    
  </form>
  <?php
 
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
    "name" => $user['name']
  ];
  header('Location: lk.php');
  echo $_SESSION['user']['id'];
  }
  elseif(mysqli_num_rows($check_project) > 0){
    $user = mysqli_fetch_assoc($check_project);
  $_SESSION['user'] =[
    "id" => $user['project_id'],
    "name" => $user['name']
  ];
  header('Location: lk.php');
  echo $_SESSION['user']['id'];
  }
  else{
    echo 'Логин или пароль неверный';
  }
  ?>
</main>    
  </body>
</html>