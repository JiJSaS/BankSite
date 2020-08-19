<?php session_start(); $log=$_SESSION['log'];$db_host = "localhost";
if ($log != "admin")
{
  header('Location: index.php');
}
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
	<form action="delRowAgr.php"  method="post">
		
	<table width='70%' border = 1 cellpadding="3" cellspacing="3">
		<tr><td> </td><td>Номер Соглашения</td><td>Имя пользователя</td><td>Имя депозита</td><td>Дата внесения</td><td>Дата окончания</td><td>Кол-во дней</td><td>Сумма в начале</td><td>Сумма в конце</td><td>Процентная ставка</td></tr>
	<?php
	$query = $db->query('SELECT * FROM `agreement`');
	while ($row = $query->fetch()) 
{
?>
<tr>
	<td> <input type = "radio" name="Agr_num_choice" value = <?php echo $row['Agr_num']?> > </td>
	<td> <?php echo $row['Agr_num'];?>   </td>
	<td> <?php echo $row['dep_username'];?>   </td>
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
<?php }?>
</table>
<br>
<button type = "submit">Выбрать</button>
</form>
</body>
</html>