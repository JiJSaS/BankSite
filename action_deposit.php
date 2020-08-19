<?php session_start(); $log=$_SESSION['log'];$db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['Agr_num_choice']))
{
    $_SESSION['Agr_num_choice'] =  $_POST['Agr_num_choice'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<br>
	Подтверждаете ли вы выбранный депозит?
	<form action="sign_employee.php"  method="post">
	<input type = "radio" name = "agr_action" value = "no" checked> Нет
	<input type = "radio" name = "agr_action" value = "yes"> Да
	<br>
	<button type="submit">Выбрать</button>
</form>
</body>
</html>


<?php }
else 
echo "Ничего не выбрано";
?>