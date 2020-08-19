<?php 
session_start();
 $log = $_POST['log'];
 $pass = $_POST['pass'];  
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if ($log == ''|| $pass == '')
{
	?>
<html>
	<body>
		Не все поля заполнены!
	<a href="index.php"><button name="exit">Выход</button> </a> 
	</body>
</html>

	<?php 
}
else{
$query_1 = $db->query("SELECT COUNT(*) FROM `employee` where `username` = '$log' and `password` = '$pass'");
 $query_2 = $db->query("SELECT COUNT(*) FROM `depositer` where `username` = '$log'and `password` = '$pass'");
 $query_1->execute();
 $query_2->execute();


if ($log=="admin" && $pass=="admin") 
	{
		$_SESSION['log'] = $log;
		header ('Location: admin.php');
	}
	$res_1 = $query_1->fetchColumn();
	$res_2 = $query_2->fetchColumn();
if(($res_1==0) && ($res_2==0)) 
{ 
	?>
	<html>
	<body>
	Пользователь не найден
	<a href="index.php"><button name="exit">Выход</button> </a> 
	</body>
</html>
	<?php 
	exit(); 
} 
else 
{ 
	$_SESSION['log'] = $log;
	$_SESSION['pass'] = $pass;
			if ($res_2==1)
				header ('Location: depositer.php'); 
			if ($res_1==1)
				header ('Location: employee.php');
}
exit();
}
?>

