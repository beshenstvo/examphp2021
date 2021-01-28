<?php 
 session_start();

 if(empty($_SESSION['user'])){
     header('Location: login.php');
 }
    $filename = ltrim( $_SERVER['REQUEST_URI'], '/');
    //echo $filename;
    //заносим данные в БД здесь
    function createForm(){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $idform = (substr(str_shuffle($permitted_chars), 0, 16));
        return $idform;
        $flag = false;
    }
    $link = '';
    if (isset($_POST['create'])){
        global $link;
        $link = createForm();
        $_SESSION['link'] = $link;
        // echo $_SESSION['link'];
        print_r($array_global);
         $conn = mysqli_connect('localhost', 'root', 'root','exam');
         if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
         }
         $the_name = $_POST['formName'];
         $the_link = $link;
         $sql = "INSERT INTO `forms`(`name`, `link`) VALUES ( '$the_name', '$the_link')";  
         if (mysqli_query($conn, $sql)) {
             echo "<script> alert('Создано БД для адреса ".$link."')</script>";
         } else {
            echo "<script> alert('Error: ". $sql . " " . mysqli_error($conn)."')</script>";
         }
    }
    if(isset($_POST['endCreate'])){
        header('Location: index.php');
    }
    $checkType1 = 0; // относится к 1 типу вопроса 
    for($i = 1; $i < 100; $i++){
        if(!empty($_POST['guestion'.$i.''])){
            $checkType1++;
        }else{
            break;
        }
    }
    $checkType2 = 0; // относится к 2 типу вопроса 
    for($i = 1; $i < 100; $i++){
        if(!empty($_POST['guestionplus'.$i.''])){
            $checkType2++;
        }else{
            break;
        }
    }
    $checkType3 = 0; // относится к 3 типу вопроса 
    for($i = 1; $i < 100; $i++){
        if(!empty($_POST['guestionstr'.$i.''])){
            $checkType3++;
        }else{
            break;
        }
    }
    $checkType4 = 0; // относится к 4 типу вопроса 
    for($i = 1; $i < 100; $i++){
        if(!empty($_POST['guestiontext'.$i.''])){
            $checkType4++;
        }else{
            break;
        }
    }
    for($i = 1; $i < $checkType1+1; $i++){ // относится к 1 типу вопроса 
        if( (!empty($_POST['guestion'.$i.''])) &&  (!empty($_POST['answer'.$i.''])) && (!empty($_POST['score'.$i.''])) ){
            $conn = mysqli_connect('localhost', 'root', 'root','exam');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $the_guestion = $_POST['guestion'.$i.''];
            $the_answer = $_POST['answer'.$i.''];
            $the_score = intval($_POST['score'.$i.'']);
            $the_id_link = $_SESSION['link'];
            $sql = "INSERT INTO `questions`(`id_link`,`question`, `answer`, `score`) VALUES ( '$the_id_link','$the_guestion', '$the_answer', $the_score)";  
            $checkType1 = 0;
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Вопросы для формы созданы!')</script>";
            } else {
               echo "<script> alert('Error: ". $sql . " " . mysqli_error($conn)."')</script>";
            }
        }else{
            echo '<script>alert("Запоните все поля!")</script>';
        }
    }
    for($i = 1; $i < $checkType2+1; $i++){ // относится к 1 типу вопроса 
        if( (!empty($_POST['guestionplus'.$i.''])) &&  (!empty($_POST['answerplus'.$i.''])) && (!empty($_POST['scoreplus'.$i.''])) ){
            $conn = mysqli_connect('localhost', 'root', 'root','exam');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $the_guestion = $_POST['guestionplus'.$i.''];
            $the_answer = $_POST['answerplus'.$i.''];
            $the_score = intval($_POST['scoreplus'.$i.'']);
            $the_id_link = $_SESSION['link'];
            $sql = "INSERT INTO `questions`(`id_link`,`question`, `answer`, `score`) VALUES ( '$the_id_link','$the_guestion', '$the_answer', $the_score)";  
            $checkType1 = 0;
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Вопросы для формы созданы!')</script>";
            } else {
               echo "<script> alert('Error: ". $sql . " " . mysqli_error($conn)."')</script>";
            }
        }else{
            echo '<script>alert("Запоните все поля!")</script>';
        }
    }
    for($i = 1; $i < $checkType3+1; $i++){ // относится к 1 типу вопроса 
        if( (!empty($_POST['guestionstr'.$i.''])) &&  (!empty($_POST['answerstr'.$i.''])) && (!empty($_POST['scorestr'.$i.''])) ){
            $conn = mysqli_connect('localhost', 'root', 'root','exam');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $the_guestion = $_POST['guestionstr'.$i.''];
            $the_answer = $_POST['answerstr'.$i.''];
            $the_score = intval($_POST['scorestr'.$i.'']);
            $the_id_link = $_SESSION['link'];
            $sql = "INSERT INTO `questions`(`id_link`,`question`, `answer`, `score`) VALUES ( '$the_id_link','$the_guestion', '$the_answer', $the_score)";  
            $checkType1 = 0;
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Вопросы для формы созданы!')</script>";
            } else {
               echo "<script> alert('Error: ". $sql . " " . mysqli_error($conn)."')</script>";
            }
        }else{
            echo '<script>alert("Запоните все поля!")</script>';
        }
    }
    for($i = 1; $i < $checkType4+1; $i++){ // относится к 1 типу вопроса 
        if( (!empty($_POST['guestiontext'.$i.''])) &&  (!empty($_POST['answertext'.$i.''])) && (!empty($_POST['scoretext'.$i.''])) ){
            $conn = mysqli_connect('localhost', 'root', 'root','exam');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $the_guestion = $_POST['guestiontext'.$i.''];
            $the_answer = $_POST['answertext'.$i.''];
            $the_score = intval($_POST['scoretext'.$i.'']);
            $the_id_link = $_SESSION['link'];
            $sql = "INSERT INTO `questions`(`id_link`,`question`, `answer`, `score`) VALUES ( '$the_id_link','$the_guestion', '$the_answer', $the_score)";  
            $checkType1 = 0;
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Вопросы для формы созданы!')</script>";
            } else {
               echo "<script> alert('Error: ". $sql . " " . mysqli_error($conn)."')</script>";
            }
        }else{
            echo '<script>alert("Запоните все поля!")</script>';
        }
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
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <title>Гатауллина Руфина 191-322</title>

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
   <div class="container">
   <h4>Вопросы созданные</h4>
       <div class="row">
       <form method="post" >
           <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='endCreate'>Создать</button>     
           </div>
        </form>
       </div>
       <hr>
       <h4>Кнопки для создания вопросов</h4>
       <div class="row">
           <div class="col">
                <button class='btn btn-outline-primary mb-2' onclick="addNumber()">Добавить вопрос (Число любое)</button>
           </div>
       </div>
       <div class="row">
           <div class="col">
                <button class='btn btn-outline-primary mb-2' onclick="addNumberPlus()">Добавить вопрос (Число положительное)</button>
           </div>
       </div>
       <div class="row">
           <div class="col">
                <button class='btn btn-outline-primary mb-2' onclick="addNumberStr()">Добавить вопрос (Строка)</button>
           </div>
       </div>
       <div class="row">
           <div class="col">
                <button class='btn btn-outline-primary mb-2'onclick="addNumberText()" >Добавить вопрос (Текст)</button>
           </div>
       </div>
   </div>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container">
            <a class="text-muted">Московский политех 2021</a>
        </div>
    </nav>
    <script>
    var counterMain = 1;
    var counterAddNumber = 0;
    function addNumber(){
        counterAddNumber+=1;
        $('.modal-body').append('<div class="form-group"><h5>'+counterMain+'</h5><label for="guestion'+counterAddNumber+'">Вопрос(число любое):</label><input name="guestion'+counterAddNumber+'" type="text" class="form-control" id="guestion'+counterAddNumber+'" placeholder="Введите вопрос для формы" required><label for="answer'+counterAddNumber+'">Ответ на вопрос(число любое):</label><input name="answer'+counterAddNumber+'" type="text" class="form-control" id="answer'+counterAddNumber+'" placeholder="Введите ответ для вопроса" required><label for="score'+counterAddNumber+'">Баллы за ответ:</label><input name="score'+counterAddNumber+'" type="text" class="form-control" id="score'+counterAddNumber+'" placeholder="Введите баллы" required></div> <hr>');
        counterMain++;
    }
    var counterAddNumberPlus = 0;
    function addNumberPlus(){
        counterAddNumberPlus+=1;
        $('.modal-body').append('<div class="form-group"><h5>'+counterMain+'</h5><label for="guestionplus'+counterAddNumberPlus+'">Вопрос(число положительное):</label><input name="guestionplus'+counterAddNumberPlus+'" type="text" class="form-control" id="guestionplus'+counterAddNumberPlus+'" placeholder="Введите вопрос для формы" required><label for="answerplus'+counterAddNumberPlus+'">Ответ на вопрос(число положительное):</label><input name="answerplus'+counterAddNumberPlus+'" type="text" class="form-control" id="answerplus'+counterAddNumberPlus+'" placeholder="Введите ответ для вопроса" required><label for="scoreplus'+counterAddNumberPlus+'">Баллы за ответ:</label><input name="scoreplus'+counterAddNumberPlus+'" type="text" class="form-control" id="scoreplus'+counterAddNumberPlus+'" placeholder="Введите баллы" required></div>  <hr>');
        counterMain++;
    }
    var counterAddNumberStr = 0;
    function addNumberStr(){
        counterAddNumberStr+=1;
        $('.modal-body').append('<div class="form-group"><h5>'+counterMain+'</h5><label for="guestionstr'+counterAddNumberStr+'">Вопрос(строка):</label><input name="guestionstr'+counterAddNumberStr+'" type="text" class="form-control" id="guestionstr'+counterAddNumberStr+'" placeholder="Введите вопрос для формы" required><label for="answerstr'+counterAddNumberStr+'">Ответ на вопрос(строка):</label><input name="answerstr'+counterAddNumberStr+'" type="text" class="form-control" id="answerstr'+counterAddNumberStr+'" placeholder="Введите ответ для вопроса" required><label for="scorestr'+counterAddNumberStr+'">Баллы за ответ:</label><input name="scorestr'+counterAddNumberStr+'" type="text" class="form-control" id="scorestr'+counterAddNumberStr+'" placeholder="Введите баллы" required></div>  <hr>');
        counterMain++;
    }
    var counterAddNumberText = 0;
    function addNumberText(){
        counterAddNumberText+=1;
        $('.modal-body').append('<div class="form-group"><h5>'+counterMain+'</h5><label for="guestiontext'+counterAddNumberText+'">Вопрос(текст):</label><input name="guestiontext'+counterAddNumberText+'" type="text" class="form-control" id="guestiontext'+counterAddNumberText+'" placeholder="Введите вопрос для формы" required><label for="answertext'+counterAddNumberText+'">Ответ на вопрос(текст):</label><input name="answertext'+counterAddNumberText+'" type="text" class="form-control" id="answertext'+counterAddNumberText+'" placeholder="Введите ответ для вопроса" required><label for="scoretext'+counterAddNumberText+'">Баллы за ответ:</label><input name="scoretext'+counterAddNumberText+'" type="text" class="form-control" id="scoretext'+counterAddNumberText+'" placeholder="Введите баллы" required></div>  <hr>');
        counterMain++;
    }
    </script> 
</body>
</html>