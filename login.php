<?php 
    session_start();
    $errors = [];
    if(!empty($_POST[login]) && !empty($_POST['password'])){
        if( ($_POST['login']=='admin') && ($_POST['password']=='12345') ){
            $_SESSION['user'] = ['login' => 'admin', 'password' => $_POST['password']];
            header('Location: index.php');
            die();
        }else{
            $errors[] = 'Неверный логин или пароль';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Гатауллина Руфина 191-322</title>
</head>
<body>
<header>
<nav class="navbar navbar-dark bg-primary">
<div class="container">
    <a class="navbar-brand" href="#">Выполнила Гатауллина Руфина 191-322</a>
  </div>
</nav>
</header>
    <div class="container mt-4 ">
        <div class="row">
            <div class="col">
            <h2>Вход для администратора</h2>
            </div>
        </div>
        <div class='row'>
            <div class="col-8">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail">Логин:</label>
                    <input type="text" class="form-control" id="exampleInputEmail" name="login">
                    <small id="emailHelp" class="form-text text-muted">Логин - admin</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль:</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    <small id="emailHelp" class="form-text text-muted">Пароль - 12345</small>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
        <nav class="navbar fixed-bottom navbar-light bg-light">
            <div class="container">
                <a class="text-muted">Московский политех 2021</a>
            </div>
        </nav>
    </div>
</body>
</html>