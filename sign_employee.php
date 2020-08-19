<?php session_start(); $log=$_SESSION['log'];$db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  if(isset($_POST['agr_action']))
{
	if ($_POST['agr_action']=="no")
	{
		header('Location: employee.php');
	}
	else
	{
		$sql = "UPDATE `agreement` SET `em_username`= ? WHERE `Agr_num`=?";
		$stmt= $db->prepare($sql);
		$stmt->execute([$log, $_SESSION['Agr_num_choice']]);
		echo "ОК!";
		header('Location: employee.php');
	}
}
?>