
<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="ru" class="h-100">
  <head>
    <meta charset="utf-8">
    <title>Profilepage</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
  form {
      max-width: 600px;
      margin: 0 auto;
    }
    .form-row {
      display: flex;
      flex-direction: column;
      margin-top: 20px;
    }
    .but-save {
  background-color: #fff;
  color: black;
  padding: 10px 20px;
  border: none;
  transition: background-color 0.3s ease
}
.exit-button {
  background-color: #fff;
  color: black;
    border: none;
  transition: background-color 0.3s ease;
  
}
.but-save:hover {
  background-color: #222529;
  color: white;
}
.exit-button:hover {
  background-color: #222529;
  color: white;
  
}
    .form-group{
      margin-left: 25%;
      padding: 50px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 50px;
      width: 50%;
      ;
       }
  .text{
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
          <li><a href="#" class="nav-link px-2 text-white">WildHunt</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Отклики</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Лайки</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Редактировать профиль</a></li>
        </ul>
                
      </div>
      <div class="exit-button">
  <form action="Loginout.php" method="Post"></form>
      <button type="submit" value="Выход" style="position:absolute;width:130px;height:40px; border-radius:10px; left:80%; top:2.9% "><a href="Loginout.php">Выход</a></button>
    </div>
  </header>
  
  
  <br><br>
  <img id="preview" src="" alt="" width="200">
</form>
<script>
  const input = document.querySelector('input[type="file"]');
  const preview = document.querySelector('#preview');
  input.addEventListener('change', () => {
    const file = input.files[0];
    const reader = new FileReader();
    reader.addEventListener('load', () => {
      preview.src = reader.result;
    });
    reader.readAsDataURL(file);
  });
</script>
  <div class="form-group">
    <div class="text">
    <label for="username">Имя пользователя</label>
    </div>
    <div class="text">
    <label for="skills-info">Стек технологий</label>
    </div>
    <div class="text">
    <label for="user-info">Дополнительная информация о пользователе</label>
    </div>
    <div class="text">
    <label for="contact-info">Контактные данные пользователя</label>
    </div>
  </div>
 
</form>
  
<script>
function previewProfilePicture(event) {
  const input = event.target;
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const preview = document.getElementById('profile-picture-preview');
      preview.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
  
</div>

  </body>
</html>