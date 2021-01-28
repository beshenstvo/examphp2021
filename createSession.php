<?php 
 session_start();

 if(empty($_SESSION['user'])){
     header('Location: login.php');
 }
    if(isset($_POST['create'])){
        echo 'Всего вопросов = '.$counter;
       if(!empty($_POST['formName'])){
          
           //добв в бд в цикле
           echo '<h1>Форма добавлена</h1>';
       }else{
           echo '<script>alert("Заполните поле с названием формы!")</script>';
       }
    }else{
        echo 'не нашел create';
    }

?>