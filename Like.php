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
                <a  href="Loginout.php"><button type="submit" class="btn btn-secondary"
                        style="position:absolute;width:130px;height:40px; border-radius:10px; left:80%; top:3.5% ">Выход</button></a>
                </div>
        </header>
       <br> <div class="form-group"><img src="forma.png"><br>
       <?php 
       
       require_once "Bd.php";
       $id = $_SESSION['user']['id'];
       $login = $_SESSION['user']['login'];
    $check_project = mysqli_query($connect, "SELECT * FROM `project_manager` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_project) > 0){
       $ids = array();
$query = "SELECT soiscatel_id FROM likes WHERE project_like_status = 1 and project_id = $id";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)) {
$ids[] = $row['soiscatel_id'];
}
$query = "SELECT * FROM soiscatel WHERE soiscatel_id IN (" . implode(",", $ids) . ")";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo  $row['picture'] . "<br>";
echo "Имя: " . $row['name'] . "<br>";
echo "О себе: " . $row['comments'] . "<br>";
echo "Стек технологий: " . $row['stack'] . "<br>";
}}
else{
    $ids = array();
$query = "SELECT project_id FROM likes WHERE soiscatel_like_status = 1 and soiscatel_id = $id";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)) {
$ids[] = $row['project_id'];
}
$query = "SELECT * FROM project_manager WHERE project_id IN (" . implode(",", $ids) . ")";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    
echo "Имя: " . $row['name'] . "<br>";
echo "О себе: " . $row['comments'] . "<br>";
echo "Стек технологий: " . $row['stack'] . "<br>";
}}
?>  
</div>
        
        



        

        
    </div>
    
    </div>
</body>
</html>