<?php
session_start();
?>
<!doctype html>
<html lang="ru" class="h-100">

<head>
  <meta charset="utf-8">

  <title>Cover Template · Bootstrap v5.0</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>


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
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;

    }
    .form-group {
      background-color: #222529;
      transition: background-color 0.5s ease;
      margin-left: 25%;
      padding: 50px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 50px;
      width: 50%;
      ;
    }

    .form-group:hover {
      background-color: #423e3e;
      margin-left: 25%;
      padding: 50px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 50px;
      width: 50%;
      ;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
</head>







<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

    <header class="p-3 bg-dark text-white ">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-white">WildHunt</a></li>


          </ul>



          <div class="text-end">
            <?php
            if (isset($_SESSION['user'])) {
              echo '<a href="lk.php" id="lk_link">
                <img src="avat.jpg" width="50" height="50" class="rounded-circle shadow-4">
            </a>';

            } else {
              echo '<a href="Registr.php"><button type="button" class="btn btn-secondary">Регистрация</button></a>';
            }

            ?>
          </div>
        </div>
      </div>
    </header>
    <main class="px-3 mt-5 ">
      <?php
      if (isset($_SESSION['user'])):?> 
        <?php 
        require_once "Bd.php";
        $login = $_SESSION["user"]["login"];
        $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
        $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
        if (mysqli_num_rows($check_soiscatel) > 0):?>
        <?php
        
             $user = get_project();
             foreach($user as $user):?>
             <?php if(($login != $user["login"])):?> 
              <div class="form-group">
              <img src="<?php echo $user["picture"] ; ?>" class="rounded-circle shadow-4"
        style="width: 300px; margin-left: 0%">
        <br>      
        
              <div class="text">
                <label for="username">Имя пользователя:</label>
                <?php echo $user["name"]; ?>
              </div>
              <div class="text">
                <label for="skills-info">Стек технологий:</label>
                <?php echo $user["stack"]; ?>
              </div>
              <div class="text">
                <label for="user-info">Дополнительная информация о пользователе:</label>
                <?php echo $user["comments"]; ?>
              </div>
              
              <br><form action="Like_script.php" method="post"><div style="margin-top: 20px"><button  type="submit" class="btn btn-success">Оценить</button></div></br>
              <input type='hidden' name='id'  value='" <?php echo $user["project_id"]?> "'/>
            </form>
              
            </form>
              </div>
              <?php endif;?>
        
                <?php endforeach; ?>
                
                
                <?php else:?><?php 
             $user = get_soiscatel();
             foreach($user as $user):?>
             <?php if(($login != $user["login"])):?> 
              <div class="form-group" >
              <img src="<?php echo $user["picture"] ; ?>" class="rounded-circle shadow-4"
        style="width: 300px; margin-left: 0%">
              <div class="text">
                <label for="username">Имя пользователя:</label>
                <?php echo $user["name"]; ?>
              </div>
              <div class="text">
                <label for="skills-info">Стек технологий:</label>
                <?php echo $user["stack"]; ?>
              </div>
              <div class="text">
                <label for="user-info">Дополнительная информация о пользователе:</label>
                <?php echo $user["comments"]; ?>
              </div>
              <form action="Like_script.php" method="post"><div style="margin-top: 20px"><button class="btn btn-success"  type="submit">Отликнуться
              <input type='hidden' name='id'  value='" <?php echo $user["soiscatel_id"]?> "'/>
              </button> </div> </form>
              
            </form>
              </div>
              <?php endif;?>
        
                <?php endforeach; ?>
                <?php endif;?>
        
      <?php else: 
        echo '<br><br><br><br><br><br><h1>Добро пожаловать на WildHunt</h1>
        <br><p class="lead">Очень рады Вас видеть</p>
        <a href="Avtoriz.php"><button type="button" class="btn btn-secondary btn-lg mt-5">Войти</button></a>';
      ?>
      <?php endif;?>

     





    </main>


  </div>



</body>

</html>