
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
.but-main {
  background-color: #fff;
  color: black;
  padding: 10px 20px;
  border: none;
  transition: background-color 0.3s ease;
  border-radius:10px; 
  left:47%; 
  top:85%
}

.but-save:hover {
  background-color: #222529;
  color: white;
}

.but-main:hover {
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

    .form-row input[type="text"] {
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    input[type="submit"] {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
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
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Войти</button>
          <button type="button" class="btn btn-secondary">Зарегистрироваться</button>
        </div>
      </div>
    </div>
  </header>
  
  <form action="#" method="post" enctype="multipart/form-data">
  <form>
  <input type="file" name="photo" accept="image/*">
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
    <label for="username">Имя пользователя</label>
    <input type="text" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="skills-info">Стек технологий</label>
    <textarea id="skills-info" name="skills-info" rows="1"></textarea>
  </div>
  <div class="form-group">
    <label for="user-info">Дополнительная информация о пользователе</label>
    <textarea id="user-info" name="user-info" rows="1" ></textarea>
  </div>
  <div class="form-group">
    <label for="contact-info">Контактные данные пользователя</label>
    <textarea id="contact-info" name="contact-info" rows="1"></textarea>
  </div>
  <p><input type="button" button class= "but-main" value="На главную" onclick="document.location='page/new.html'"></p>
  <button type="submit" button class= "but-save"style="width:150px;height:50px;position:relative; border-radius:10px; left:70%; top:10%">Сохранить</button>
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
