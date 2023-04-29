
<!doctype html>
<html lang="ru" class="h-100">
  <head>
    <meta charset="utf-8">

    <title>Cover Template · Bootstrap v5.0</title>
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

  body {
  background-image: url("altumcode-dMUt0X3f59Q-unsplash.jpg");
  background-repeat: no-repeat;
  background-size: cover;
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
          <li><a href="#" class="nav-link px-2 text-white">О нас</a></li>
          
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Поиск..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-warning" onclick="document.location='Registr.php'">Регистрация</button>
        </div>
      </div>
    </div>
  </header>
  <main class="px-3 mt-5 ">
    <h1>Добро пожаловать на WildHunt</h1>
    <p class="lead">Очень рады Вас видеть</p>
    <button type="button" class="btn btn-secondary btn-lg mt-5" onclick="document.location='Avtoriz.php'">Войти</button>
  </main>

  
</div>


    
  </body>
</html>
