<?php session_start();
 $log=$_SESSION['log'];
 if ($log == "admin"){
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

 $n_log = $_POST['n_log'];
 $pass = $_POST['pass'];
 $name = $_POST['name'];
 $surname = $_POST['surname'];
 $s_name = $_POST['second_name'];
 $age = $_POST['age'];
 $address = $_POST['address'];
 $tel_num = $_POST['tel_num'];
 $pas_num = $_POST['pass_num'];
 $position = $_POST['position'];
 $salary = $_POST['salary'];

 $query_1 = $db->query("SELECT COUNT(*) FROM `employee` where `username` = '$n_log'");
 $query_2 = $db->query("SELECT COUNT(*) FROM `depositer` where `username` = '$n_log'");
 $res_1=$query_1->fetchColumn();
 $res_2 = $query_2->fetchColumn();
if(($res_1==0) && ($res_2==0)) 
{ 
	 $sql = "INSERT INTO `employee` (`username`,`Name`,`Surname`,`Second_name`,`Age`, `Address`, `Telnum`, `Pasnum`, `Position`, `Salary`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
 	$statement = $db->prepare($sql);
 	$statement->execute([$n_log,$name,$surname,$s_name, $age, $address, $tel_num,$pas_num, $position, $salary, $pass]);
 	header('Location: admin.php');
} 
else 
{ 
	echo "Такой пользователь уже существует";
}
exit();
}
else
{
	header('Location: index.php');
}
?>