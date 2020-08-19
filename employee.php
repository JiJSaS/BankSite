<?php session_start(); $log=$_SESSION['log'];

$db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);
 $query_if = $db->query('SELECT COUNT(*) FROM `agreement` where `em_username` IS NULL');
 $query_if->execute();
 $res = $query_if->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
	<a href="index.php"><button name="exit">Выход</button></a><br>
	<?php if($res != 0) { ?>
	<form action="action_deposit.php"  method="post">
	<table width='50%' border = 1 cellpadding="3" cellspacing="3">
		<tr><td> </td><td>Номер Соглашения</td><td>Имя пользователя</td><td>Имя депозита</td><td>Дата внесения</td><td>Дата окончания</td><td>Кол-во дней</td><td>Сумма в начале</td><td>Сумма в конце</td><td>Процентная ставка</td></tr>
	<?php
	$query = $db->query('SELECT * FROM `agreement` where `agreement`.`em_username` IS NULL');
	while ($row = $query->fetch()) 
{
?>
<tr>
	<td> <input type = "radio" name="Agr_num_choice" value = <?php echo $row['Agr_num']?> > </td>
	<td> <?php echo $row['Agr_num'];?></td>
	<td> <?php echo $row['dep_username'];?></td>
	<td> <?php 
  $idk = $row['id_deposit'];
  $n_query = $db->query("SELECT `Name` from `deposit` where `id_deposit` = '$idk'");
  $row_2 = $n_query->fetch();
  echo $row_2['Name'];
        ?></td>
	<td> <?php echo $row['Dep_date_in'];?></td>
	<td> <?php echo $row['Dep_date_out'];?></td>
	<td> <?php echo $row['Days'];?></td>
	<td> <?php echo $row['Sum_dep_in'];?></td>
	<td> <?php echo $row['Sum_dep_out'];?></td>
	<td> <?php echo $row['Percent_st'];?>%</td>
</tr>
<?php } ?>
</table>
<br>
<button type = "submit">Выбрать</button>
</form>
<?php }
else 
{
	?>
	Нет активных соглашений
	<?php } ?>
</body>
</html>