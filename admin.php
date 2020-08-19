<?php session_start(); $log = $_SESSION['log']; 
if ($log != "admin")
{
  header('Location: index.php');
}?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Панель Админа</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      padding-top: 20px;
    }
  </style>
</head>
<body>
<a href="index.php"><button name="exit">Выход</button> </a> <?php echo $log ?> 
<br><br>
  <a href="newEmployee.php" class="btn btn-primary" href="#" role="button">Новый Сотрудник</a>  
  <a href="newDeposit.php" class="btn btn-primary" href="#" role="button">Новый Депозит</a>  
  <br><br>
  <a href="delAgreement.php" class="btn btn-danger" href="#" role="button">Удалить Соглашение</a> 
  <a href="delAnyUser.php" class="btn btn-danger" href="#" role="button">Удалить Пользователя</a> 
  <a href="del_employee.php"class="btn btn-danger" href="#" role="button">Удалить Сотрудника</a>  
  <a href="del_deposit.php" class="btn btn-danger" href="#" role="button">Удалить Депозит</a>  
</body>
</html>


 