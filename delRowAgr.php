<?php session_start(); $log=$_SESSION['log'];$db_host = "localhost";
if ($log != "admin")
{
  header('Location: index.php');
}
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass);

if(isset($_POST['Agr_num_choice']))
{
    $course = $_POST['Agr_num_choice'];
    $sql = "DELETE FROM `agreement` WHERE `Agr_num`='$course'";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    header('Location: admin.php');
}
else 
echo "Ничего не выбрано";
?>