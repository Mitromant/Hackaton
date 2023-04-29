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
      margin-left: 230px;
      width: 100%;
    }
  </style>
</head>


<body class="bg-light">

  <div class="container">
    <main>
      <div style="margin-left: 45px" class="py-5 text-center">
        <h2>Форма регистрации</h2>
        <p class="lead">Пожалуйста заполните указанные поля для регистрации.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">

          <form  method="post">
            <h4 class="mb-3 text-center">Регистрация на сайте</h4>
            <div class="row g-3">

              <div class="col-sm-6">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Login...">
              </div>

              <div class="col-sm-6">
                <label for="pass" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" id="pass" placeholder="Password...">
              </div>

              <div class="col-12">
                <label for="textarea" class="form-label"> О себе: </label>
                <textarea class="form-control" name="comments" id="comments"
                  placeholder="Я изучаю... Работаю над..."></textarea>
              </div>

              <div class="col-12">
                <label for="textarea" class="form-label"> Свои навыки стэка через запятую: </label>
                <textarea class="form-control" name="stek" id="stek" placeholder="html... php..."></textarea>
              </div>

              <div class="col-sm-6">
                <label for="contact" class="form-label">Контактна информация</label>
                <input type="text" class="form-control" name="contact" id="contact"
                  placeholder="Ссылка на телеграм.. инстаграм..">
              </div>

              <div class="col-12">
                <label for="formFile" class="form-label">Выбирете файл</label>
                <input class="form-control" type="file" id="formFile">
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1"> Соискатель</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2"> Проект Менеджер </label>
              </div>



              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Зарегистрироваться</button>
          </form>
          <?php
          include ("Bd.php");

          $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);

          /*filter_var фильтрует, то есть удаляет ненужные символы*//*trim удаляет пробелы*/

          $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
          $password = md5($password);
          $comments = filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING);
          $stek = filter_var(trim($_POST['stek']), FILTER_SANITIZE_STRING);
          $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_STRING);
          $type_user = trim($_POST['exampleRadios']);
          $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
          $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
          if(mb_strlen($login) < 5 || mb_strlen($login) > 20){
            echo ("Недопустимая длина логина");
            exit();

          }
          elseif(mb_strlen($password) < 8){
            echo ("Пароль не должен быть меньше 8");
            exit();
          } 
          elseif(mysqli_num_rows($check_soiscatel) > 0 || mysqli_num_rows($check_project) > 0 ){
            echo ("Данный логин уже занят");
            exit();
          }
          else{
            if ($type_user == 1){
              mysqli_query($connect,"INSERT INTO `soiscatel`(`soiscatel_id`, `login`, `password`, `name`, `comments`, `picture`, `stack`, `contact`) VALUES (NULL,'$login','$password','1','$comments','1','$stek','$contact')");  
              
            }
            elseif($type_user == 0){
              mysqli_query($connect,"INSERT INTO `project_manager`(`project_id`, `login`, `password`, `name`, `comments`, `picture`, `stack`, `contact`) VALUES (NULL,'$login','$password','1','$comments','1','$stek','$contact')"); 
              
            }
            
          }
          
          ?>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">

      <div style="margin-right: auto" class="py-5 text-center ">
        <a href="../index.php">Обратно назад</a>
      </div>
      <p class="mb-1">&copy; 2023</p>
    </footer>
  </div>
</body>

</html>