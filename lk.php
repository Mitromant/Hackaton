<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: index.php');
}
?>
<!doctype html>
<html lang="ru" class="h-100">

<head>
  <meta charset="utf-8">

  <title>Profilepage</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .my-button {
      color: red;
    }

    body {
      background-image: url("back.jpg");
      /* Путь к изображению */
      background-repeat: no-repeat;
      /* Не повторять фон */
      background-size: cover;
      /* Заполнить всю площадь экрана */
      background-attachment: fixed;
    }

    form {
      max-width: 600px;
      margin: 0 auto;
    }

    .form-row {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
    }

    img {
      border-radius: 50%;
      cursor: pointer;
      /* Изменение курсора на указатель при наведении на изображение */
    }

    .but-save:hover {
      background-color: #222529;
      color: white;
    }

    .exit-button:hover {
      background-color: #222529;
      color: white;

    }

    .form-group {
      background-color: #222529;
      margin-left: 25%;
      padding: 50px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 50px;
      width: 50%;
      ;
    }

    .ournaming{
      font-size: 24px;
    }


    .text {

      padding: 50px;
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <link href="cover.css" rel="stylesheet">
</head>


<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="p-3 bg-dark text-white ">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-white">WildHunt</a></li>
            <li><a href="Otclic.php" class="nav-link px-2 text-white">Взаимные</a></li>
            <li><a href="Like.php" class="nav-link px-2 text-white">Отклики</a></li>
            <li><a href="Update.php" class="nav-link px-2 text-white">Редактировать профиль</a></li>

          </ul>
          <div class="text-end">

          </div>
        </div>
        <div class="exit-button">
        <a href="Loginout.php"><button type="submit" class="btn btn-secondary"
            style="position:absolute;width:130px;height:40px; border-radius:10px; left:80%; top:3.5% ">Выход</button></a>
        </div>
    </header>


    <br><br>
    <img id="preview" src="" alt="" width="200">
    </form>

    <?php
    require_once 'Bd.php';
    $login = $_SESSION['user']['login'];
    $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
    $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_soiscatel) > 0): ?>
      <?php
      $user = get_soiscatel();
      foreach ($user as $user): ?>
        <?php if (($login == $user["login"])): ?>
          <img src='<?php echo $user["picture"]; ?>' class="rounded-circle shadow-4" style="width: 300px; margin-left: 40%">
          <br><div class="form-group">
            <div class="text">
              <label for="username">Имя пользователя: </label>
              <?php echo $user["name"]; ?>
            </div>
            <hr>
            <div class="text">
              <label for="skills-info">Стек технологий: </label>
              <?php echo $user["stack"]; ?>
            </div>
            <hr>
            <div class="text">
              <label for="user-info">Дополнительная информация о пользователе: </label>
              <?php echo $user["comments"]; ?>
            </div>
            <hr>
            <div class="text">
              <label for="contact-info">Контактные данные пользователя: </label>
              <?php echo $user["contact"]; ?>
            </div>
          </div>
        <?php endif; ?>

      <?php endforeach; ?>


    <?php else: ?>
      <?php
      $user = get_project(); foreach ($user as $user): ?>
        <?php if (($login == $user["login"])): ?>
          <img src='<?php echo $user["picture"]; ?>' class="rounded-circle shadow-4" style="width: 300px; margin-left: 43%">
          <div class="form-group">
            <div class="text">
              <label for="username">Имя пользователя:</label>
              <?php echo $user["name"]; ?>
            </div>
            <hr class="hr-primary">
            <div class="text">
              <label for="skills-info">Стек технологий:</label>
              <?php echo $user["stack"]; ?>
            </div>
            <hr>
            <div class="text">
              <label for="user-info">Дополнительная информация о пользователе:</label>
              <?php echo $user["comments"]; ?>
            </div>
            <hr>
            <div class="text">
              <label for="contact-info">Контактные данные пользователя:</label>
              <?php echo $user["contact"]; ?>
            </div>
          </div>
        <?php endif; ?>

      <?php endforeach; ?>
    <?php endif; ?>






  </div>

  </form>




  </div>



</body>

</html>