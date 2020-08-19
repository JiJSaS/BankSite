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
	<form action="dropAnyUser.php"  method="post">
	<table width='50%' border = 1 cellpadding="3" cellspacing="3">
		<tr><td> </td><td>Логин</td><td> Имя</td><td>Фамилия</td><td>Отчество</td><td> Адрес</td><td>Номер телефона</td><td>Номер пасспорта</td></tr>
	<?php
	$query = $db->query('SELECT * FROM `depositer`');
	while ($row = $query->fetch()) 
{
?>
<tr>
	<td> <input type = "radio" name="user_chosen" value = <?php echo $row['username']?> > </td>
	<td> <?php echo $row['username'];?>   </td>
	<td> <?php echo $row['Name'];?>   </td>
	<td> <?php echo $row['Surname']; ?>   </td>
	<td> <?php echo $row['Second_name'];?>   </td>
	<td> <?php echo $row['Address'];?>   </td>
	<td> <?php echo $row['Tel_num'];?>   </td>
	<td> <?php echo $row['Pas_num'];?>   </td>
</tr>
<?php }?>
</table>
<br>
<button type = "submit">Выбрать</button>
</form>
</body>
</html>