<?php 
 session_start();

 if(empty($_SESSION['user'])){
     header('Location: login.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <title>Гатауллина Руфина 191-322</title>
    <style>
    .a:hover{
        cursor:pointer;
        text-decoration: none;
        color:white;
    }
    .a{
        color: #dc3545;
    }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Выполнила Гатауллина Руфина 191-322</a>
        <form class="form-inline my-2 my-lg-0 text-white" style="margin-inline-start: auto;" method='POST' action="logout.php">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name='submit'>Выход</button>
        </form>
    </div>
    </nav>
    </header>
   <div class="container mt-4 mb-4">
    <div class="row">
        <h4>Проверка ответов.</h4>
    </div>
    <div class="row">
    PS не успела сделать проверку формы
    </div>
    <?php
    if(isset($_POST['back'])){
        header('Location: ../index.php');
    }
    ?>
    <div class="row">
        <form method="POST"><button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name='back'>На начальную страницу</button></form>
    </div>
   </div>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container">
            <a class="text-muted">Московский политех 2021</a>
        </div>
    </nav>

</body>
</html>