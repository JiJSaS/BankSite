<?php session_start(); $log=$_SESSION['log'];$db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
    <a href="index.php"><button name="exit">Выход</button> </a> <?php echo $log ?> <br>
  Ваши вклады:
  
  <table width='50%' border = 1 cellpadding="3" cellspacing="3">
    <tr> <td> Название вклада </td> <td> Дата открытия вклада </td>  <td> Дата окончания вклада </td>  <td> Сумма вклада </td>  <td> Валюта </td>  </tr> 
<?php 
$query = $db->query("SELECT * FROM `agreement` where `dep_username`='$log'");
while ($row = $query->fetch()) 
{
?>
  <tr>
    <td> <?php 
  $idk = $row['id_deposit'];
  $n_query = $db->query("SELECT `Name` from `deposit` where `id_deposit` = '$idk'");
  $row_2 = $n_query->fetch();
  echo $row_2['Name'];
        ?></td>
  <td> <?php echo $row['Dep_date_in'];?></td>
  <td> <?php echo $row['Dep_date_out'];?></td>
  <td> <?php echo $row['Sum_dep_in']; ?></td>
  <td> <?php 
  $idk = $row['Cur_code'];
  $n_query = $db->query("SELECT `Name` from `currency` where `code` = '$idk'");
  $row_2 = $n_query->fetch();
  echo $row_2['Name'];
        ?></td>
</tr>
<?php } ?>
</table>
  <a href="chooseDeposit.php"><button name = "new_dep">Открыть новый вклад</button></a>
</body>
</html>
