<?php 
    session_start();

    if(empty($_SESSION['user'])){
        header('Location: login.php');
    }
    if(!empty($_GET['idfordelete'])){
        $conn = new mysqli('localhost', 'root', 'root','exam') or die ('Невозможно открыть базу');
        $deleteId = intval($_GET['idfordelete']);
        $sql = "DELETE FROM `forms` WHERE id = $deleteId";
        if (mysqli_query($conn, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    if(!empty($_GET['formlink'])){
        header('Location: form.php/?formlink='.$_GET['formlink'].'');
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
    <main>
           <div class="container mt-4">
              <div class="row">
                  <div class="col">
                  <h2>Добро пожаловать, admin</h2>
                  </div>
              </div>
              <div class="row mt-4">
                    <button type="button" class="btn btn-outline-primary mb-4" data-toggle="modal" data-target="#exampleModal">Создать форму(сессию)</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создание формы</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       
                        <form method="post" action='expert.php'>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Назовите форму:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail" name="formName" placeholder='example' required>
                                </div>
                                <hr>
                               <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Вопрос 1:</label>
                                    <input name="guestion1" type="text" class="form-control" id="exampleInputPassword1" placeholder='Введите вопрос для формы' required>
                                    <label for="type">Выберите тип вопроса:</label>
                                    <select name="typeOfQuestion1" id="type" class="form-control" >
                                        <option value="1">Число</option>
                                        <option value="2">Положительное число</option>
                                        <option value="3">Строка</option>
                                        <option value="4">Текст</option>
                                    </select>
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                                <button type="submit" class="btn btn-primary" name='create'>Создать</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
              </div>
              <div class="row">
                <h4>Списки созданных форм(сессий)</h4>
                
                <?php 
                    $conn = new mysqli('localhost', 'root', 'root','exam') or die ('Невозможно открыть базу');
                    $sql = "SELECT * FROM `forms`";
                    $result = $conn->query($sql); 
                    echo '<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название формы</th>
                        <th scope="col">Ссылка</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>';
                    while ($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                                for ($j = 0 ; $j < 1 ; ++$j) echo "   
                                <th scope='row'>".$row['id']."</th> 
                                <td>".$row['name']."</td>
                                <td><a href='/?formlink=".$row['link']."'>".'http://'.$_SERVER['HTTP_HOST'].$row['link']."</a></td>
                                <td style='display: flex; justify-content: flex-end;'><form action='GET'><button class='btn btn-outline-success' style='margin-right: 20px;'>Изменить</button><button class='btn btn-outline-danger' ><a class='a' href='/?idfordelete=".$row["id"]."'>Удалить</button></form></td>";
                            echo "</tr>";
                    }
                    echo "</table>";
            ?>
              </div>
          </div>
    </main>
    <nav class="navbar fixed-bottom navbar-light bg-light">
        <div class="container">
            <a class="text-muted">Московский политех 2021</a>
        </div>
    </nav>
</body>
</html>