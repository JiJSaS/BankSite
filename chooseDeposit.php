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
  <title>Deposits</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
<body>
	<a href="index.php"><button name="exit">Выход</button></a><br>
	<form action="createDeposit.php"  method="post">
	<table width='50%' border = 1 cellpadding="3" cellspacing="3">
		<tr> <td></td> <td> Название </td>  <td> Минимальное кол-во дней</td>  <td> Минимальная сумма вклада </td>  <td> Валюта вклада </td> <td> Процентная ставка </td> </tr> 
	<?php
	$query = $db->query('SELECT * FROM `deposit`');
	while ($row = $query->fetch()) 
{
?>
<tr>
	<td> <input type = "radio" name="deposit_choice" value = <?php echo $row['id_deposit']?> > </td>
	<td> <?php echo $row['Name'];?></td>
	<td> <?php echo $row['Min_days'];?></td>
	<td> <?php echo $row['Min_sum']; ?></td>
	<td> <?php 
  $idk = $row['Cur_code'];
  $n_query = $db->query("SELECT `Name` from `currency` where `code` = '$idk'");
  $row_2 = $n_query->fetch();
  echo $row_2['Name'];
        ?></td>
	<td> <?php echo $row['Percent_dep'];?>%</td>
</tr>
<?php } ?>
</table>
<br>
<button type = "submit">Выбрать</button>
</form>
</body>
</html>