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
  <title>Регистрация</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <style>
    form {
      display: block;
      margin-top: auto;
      margin-right: auto;
      margin-left: auto;
      
      width: 100%;
    }
    
    body {
      background-image: url("back.jpg");
      background-repeat: no-repeat;
      background-size: cover;

    }
    .wrapper{
  position: relative;
  margin-left: 20%;
  width: 120%;
  height: 100%;
  background: transparent;
  border: 2px solid rgba(255,255,255,.5);
  border-radius: 20px;
  backdrop-filter: blur(20px);
  box-shadow: 0 0 30px rgba(0, 0, 0, .5);

}
  </style>
</head>


<body class="bg-light">

  <div class="container">
    <main>
      <div style="margin-left: 70px; color: #F0FFFF; font-family: Arial;" class="py-5 text-center">
        
        <p class="lead">Пожалуйста заполните указанные поля для регистрации.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">


        <div class="wrapper">
          <form  method="post" enctype="multipart/form-data">
          <div style="margin-left: 45px; color: #F0FFFF; font-family: Arial;" class="py-5 text-center">
            <h4 class="mt-1 text-center">Регистрация на сайте</h4>
          </div>
            <div class="row g-3">
 
              <div class="col-sm-6">
              <div style="margin-left:60px; font-family: Arial; color: #F0FFFF;"><label for="login" class="form-label">Логин</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="login" id="login" placeholder="Login...">
              </div>

              <div class="col-sm-6">
              <div style="margin-left:60px; font-family: Arial; color: #F0FFFF;"><label for="pass" class="form-label">Пароль</label></div>
                <input type="password" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="password" id="pass" placeholder="Password...">
              </div>

              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> О себе: </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="comments" id="comments"
                  placeholder="Я изучаю... Работаю над...Имею опыт..."></textarea>
              </div>

              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> Свои навыки стэка через запятую: </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="stek" id="stek" placeholder="html... php..."></textarea>
              </div>

              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Контактная информация</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="contact" id="contact"
                  placeholder="Телеграм/Телефон/Почта">
              </div>


              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Имя/название проекта</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="name" id="name"
                  placeholder="Имя/название проекта...">
              </div>


              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="formFile" class="form-label">Выбирете файл</label></div>
                <input class="form-control" style= "width: 80%; display: block; margin: 0 auto;" type="file" id="formFile" name="img">
              </div>

              <div class="form-check" >
                <input class="form-check-input" style="margin-left: 10px;" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label class="form-check-label" for="exampleRadios1"> Соискатель</label></div>
              </div>

              <div class="form-check">
                <input class="form-check-input" style="margin-left: 10px;" type="radio" name="exampleRadios" id="exampleRadios2" value="0">
                <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label class="form-check-label" for="exampleRadios2"> Проект Менеджер </label></div>
              </div>



              <hr class="my-3">

              <div style="margin-left: 25%;"><button class="w-50 btn btn-primary btn-lg" type="submit">Зарегистрироваться</button></div><br>
          </form>
          <?php
          include ("Bd.php");
          ini_set('display_errors','Off');
          $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
          $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
          /*filter_var фильтрует, то есть удаляет ненужные символы*//*trim удаляет пробелы*/
          $img = $_FILES["img"]["name"];
          move_uploaded_file($_FILES['img']['tmp_name'], $_FILES["img"]["name"]);
          $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
          $password = md5($password);
          $comments = filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING);
          $stek = filter_var(trim($_POST['stek']), FILTER_SANITIZE_STRING);
          $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_STRING);
          $type_user = trim($_POST['exampleRadios']);
          $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
          $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
        
          
          if(mysqli_num_rows($check_soiscatel) > 0 || mysqli_num_rows($check_project) > 0 ){
            echo ("Данный логин уже занят");
            exit();
          }
          else{
            if ($type_user == 1){
              mysqli_query($connect,"INSERT INTO `soiscatel`(`soiscatel_id`, `login`, `password`, `name`, `comments`, `picture`, `stack`, `contact`) VALUES (NULL,'$login','$password','$name','$comments','$img','$stek','$contact')");  
              header('Location: index.php');
            }  
            elseif($type_user == 0){
              mysqli_query($connect,"INSERT INTO `project_manager`(`project_id`, `login`, `password`, `name`, `comments`, `picture`, `stack`, `contact`) VALUES (NULL,'$login','$password','$name','$comments','$img','$stek','$contact')"); 
              header('Location: index.php');
            }
            
          }
          
          ?>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">

      <div style="margin-right: -55 px; margin-top: -100px" class="py-5 text-center ">
        <a href="index.php">Назад</a>
      </div>
    </footer>
  </div>
</body>

</html>