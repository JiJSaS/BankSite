<?php session_start(); $log=$_SESSION['log'];
if ($log != "admin")
{
  header('Location: index.php');
}
$db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

if(isset($_POST['user_chosen']))
{
    $course = $_POST['user_chosen'];
    $sql = "DELETE FROM `depositer` WHERE `username`='$course'";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    header('Location: admin.php');
}
else 
echo "Ничего не выбрано";
?>