<?php session_start();
 $log=$_SESSION['log'];
 if ($log != "admin")
{
  header('Location: index.php');
}
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


 $name = $_POST['name'];
 $min_days = $_POST['Min_days'];
 $min_sum = $_POST['Min_sum'];
 $percent = $_POST['Percent_dep'];
 $code = $_POST['Cur_code'];

 $query_1 = $db->query("SELECT * FROM `deposit` where `Name` = '$name'");

if($query_1->fetchColumn() == $name) 
{ 
	echo "Такой пользователь уже существует";
	 
} 
else 
{ 
	$sql = "INSERT INTO `deposit` (`Name`,`Min_days`, `Min_sum`, `Percent_dep`, `Cur_code`) VALUES (?,?,?,?,?)";
 	$statement = $db->prepare($sql);
 	$statement->execute([$name, $min_days, $min_sum, $percent, $code]);
 	header('Location: admin.php');
}
exit();
?>