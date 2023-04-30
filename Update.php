<?php
session_start();

?>
<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Редактирование</title>
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
        
        <p class="lead">Пожалуйста заполните указанные поля для редактирования.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">


        <div class="wrapper">
          
          <div style="margin-left: 45px; color: #F0FFFF; font-family: Arial;" class="py-5 text-center">
            <h4 class="mt-1 text-center">Редактирование</h4>
          </div>
            

              
          <?php
          require_once 'Bd.php';
          $login = $_SESSION['user']['login'];
          $check_soiscatel = mysqli_query($connect, "SELECT * FROM `soiscatel` WHERE `login` = '$login'");
          $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
          if (mysqli_num_rows($check_project) > 0):?>
           <?php 
           $user = get_project();
           foreach($user as $user):?> <?php if(($login == $user["login"])):?>
           <form action="Update_user.php" method="post">
            <div class="row g-3">
              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> О себе: </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="comments" id="comments"
                ><?php echo $user["comments"]; ?></textarea>
              </div>

              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> Свои навыки стэка через запятую: </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="stek" id="stek" placeholder="html... php..."><?php echo $user["stack"]; ?></textarea>
              </div>

              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Контактная информация</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="contact" id="contact"
                 value="<?php echo $user["contact"]; ?>">
              </div>


              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Имя/название проекта</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="name" id="name"
                value="<?php echo $user["name"]; ?>">
              </div>
              <hr class="my-3">

              <div style="margin-left: 25%;"><button class="w-50 btn btn-primary btn-lg" type="submit">Сохранить</button></div><br>
          </form>
            </div>
            </div>
            <?php endif;?>
              <?php endforeach;?>
              <?php else:?><?php  
           $user = get_soiscatel();
           foreach($user as $user):?> <?php if(($login == $user["login"])):?>
           <form action="Update_user.php" method="post">
            <div class="row g-3">
              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> О себе: </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="comments" id="comments"
                ><?php echo $user["comments"]; ?></textarea>
              </div>

              <div class="col-12">
              <div style="margin-left:110px; font-family: Arial; color: #F0FFFF;"><label for="textarea" class="form-label"> Стек технологии </label></div>
                <textarea class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="stek" id="stek" placeholder="html... php..."><?php echo $user["stack"]; ?></textarea>
              </div>

              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Контактная информация</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="contact" id="contact"
                 value="<?php echo $user["contact"]; ?>">
              </div>


              <div class="col-sm-6">
              <div style="margin-left:50px; font-family: Arial; color: #F0FFFF;"><label for="contact" class="form-label">Имя/название проекта</label></div>
                <input type="text" class="form-control" style= "width: 80%; display: block; margin: 0 auto;" name="name" id="name"
                value="<?php echo $user["name"]; ?>">
              </div>
              <hr class="my-3">

              <div style="margin-left: 25%;"><button class="w-50 btn btn-primary btn-lg" type="submit">Сохранить</button></div><br>
          </form>
            </div>
            </div>
            <?php endif;?>
            <?php endforeach;?>
              <?php endif;?>
              </div>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">

      <div style="margin-right: -50px; margin-top: -100px;" class="py-5 text-center ">
      <a href="lk.php"><button class="w-120  btn btn-secondary style">Назад</button></a>
        
      </div>
          </footer>
  </div>
</body>

</html>