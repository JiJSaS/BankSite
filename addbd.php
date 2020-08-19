<?php 
session_start();
$_SESSION['log']=$log;
$con=$_SESSION['con'];
require 'configDB.php';
$alconame = $_POST['add'];
$_SESSION['alconame'] = $alconame;

if ($con==1) 
{


  if($alconame == '') 
  {
  echo "Вы не заполнили поля";
  } 

  else
  {
  	mkdir("$alconame");


     $sql = "CREATE TABLE `".$alconame."` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `desc` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `rev` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci";
     mysqli_query($connection, $sql);

   	 header ('Location: add.php');

  
  }
 }
if ($con==2) {
	$desc=$_POST['desc'];
	$sql = "INSERT INTO `".$alconame."` (`desc`) VALUES('$desc')";
    mysqli_query($connection, $sql);
    header ('Location: admin.php');	
}

?>