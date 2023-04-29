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


          </ul>



          <div class="text-end">
            <?php
            if (isset($_SESSION['user'])) {
              echo '<a href="lk.php" id="lk_link">
                <img src="364098_467200.jpg" width="50" height="50">
            </a>';

            } else {
              echo '<button type="button" class="btn btn-warning"><a href="Registr.php">Регистрация</a></button>';
            }

            ?>
          </div>
        </div>
      </div>
    </header>
    <main class="px-3 mt-5 ">
      <?php
      if (isset($_SESSION['user'])) {
        echo '<div class="container-fluid">
        <div class="carousel-caption d-none d-md-block">
        
                <div id="carouselExampleFade" class="carousel slide carousel-fade " data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="picture.jpg" class="d-block w-100 img-thumbnail" style="width: 100%; height: 550px; object-fit: cover;" alt="...">
                    </div>
        
                    <div class="carousel-item">
                      <img src="rish.jpg" class="d-block w-100 img-thumbnail" style="width: 100%; height: 550px; object-fit: cover;" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="netural.jpg" class="d-block w-100 img-thumbnail" style="width: 100%; height: 550px; object-fit: cover;  " alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                  </button>
                </div>
                <button type="button" class="btn btn-success bm-2">Лайк</button>
                <button type="button" class="btn btn-danger">Дизлайк</button>
                </div>
        </div>';
      } else {
        echo '<h1>Добро пожаловать на WildHunt</h1>
            <p class="lead">Очень рады Вас видеть</p>
            <button type="button" class="btn btn-secondary btn-lg mt-5"><a href="Avtoriz.php">Войти</a></button>';
      }

      ?>






    </main>


  </div>



</body>

</html>