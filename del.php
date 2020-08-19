<?php 
session_start();
$_SESSION['log']=$log;
$con=$_SESSION['con'];
require 'configDB.php';
$alconame = $_POST['del'];
$_SESSION['alconame'] = $alconame;

  if($alconame == '') 
  {
  echo "Вы не заполнили поля";
  } 

  else
  {

 function rmRec($path) {
  if (is_file($path)) return unlink($path);
  if (is_dir($path)) {
    foreach(scandir($path) as $p) if (($p!='.') && ($p!='..'))
      rmRec($path.DIRECTORY_SEPARATOR.$p);
    return rmdir($path); 
    }
  return false;
  }

rmRec($alconame);

     $sql = "DROP TABLE `".$alconame."`";
     mysqli_query($connection, $sql);

   	 header ('Location: admin.php');

  
  }
 


?>