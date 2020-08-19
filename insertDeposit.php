<?php session_start();
 $log=$_SESSION['log'];
 $id_deposit = $_SESSION['deposit_id'];
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
 $days = $_POST['days'];
 $sum = $_POST['sum'];

 $ready_to_insert = true;
 $query = $db->query("SELECT * FROM `deposit` where `id_deposit` = '$id_deposit'");
 while ($row = $query->fetch()) 
 {
 	$C_c = $row['Cur_code'];
 	$p_s = $row['Percent_dep'];
 	if($days < $row['Min_days'])
 	{
 		$ready_to_insert = false;
 		echo "too few days";
 	}
 	if ($sum < $row['Min_sum'])
 	{
 		$ready_to_insert = false;
 		echo "too small sum";
 	}

 }
 if ($ready_to_insert)
 {
 	$date_in = date('Y-m-d');
 	$date_out = date('Y-m-d', strtotime($date_in. '+'. $days. 'days'));
 	$sum_out = $sum;
 	$i=0;
 	while ($i<($days/30))
 	{
 		$sum_out += $sum_out * $p_s/100;
 		$i++;
 	}
 	$sql = "INSERT INTO `agreement` (`dep_username`,`id_deposit`,`Cur_code`,`Dep_date_in`,`Days`, `Dep_date_out`, `Sum_dep_in`, `Sum_dep_out`, `Percent_st`) VALUES (?,?,?,?,?,?,?,?,?)";
 	$statement = $db->prepare($sql);
 	$statement->execute([$log, $id_deposit,$C_c, $date_in, $days, $date_out, $sum, $sum_out,$p_s]);
 	header('Location: depositer.php');
 }
?>