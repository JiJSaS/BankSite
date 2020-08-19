<?php session_start();
$log = $_SESSION['log'];
if ($log != "admin")
{
  header('Location: index.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Банк</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      padding-top: 20px;
    }
  </style>
</head>
<body>
<div class="container">
 
            <h1 class="text-center">Новый вклад</h1>
            <div class="card-body">
            <form action="insertNewDep.php"  method="post">
              <input type="text" name="name" class="form-control" placeholder="Название">
              <input type="number" name="Min_days" class="form-control" placeholder="Минимальное кол-во дней">
              <input type="number" name="Min_sum" class="form-control" placeholder="Минимальная сумма вклада">
              <input type="number" step ="0.01"  name="Percent_dep" class="form-control" placeholder="Процент">
              <input type="number" name="Cur_code" class="form-control" placeholder="Номер валюты">
              <hr>
              <button class="btn btn-lg btn-warning btn-block text-white" type="submit">Создать</button>
              </form>
            </div> 
</div>  
</body>
</html>