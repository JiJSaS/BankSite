  <?php session_start();
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
  $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


  $log = $_POST['log'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $second_name = $_POST['s_name'];
  $address = $_POST['address'];
  $tel_num = $_POST['tel_num'];
  $pass_num = $_POST['pas_num'];
  $pass = $_POST['pass'];


$query_1 = $db->query("SELECT * FROM `employee` where `username` = '$log'");
 $query_2 = $db->query("SELECT * FROM `depositer` where `username` = '$log'");

if(($query_1->fetchColumn() != $log) && ($query_2->fetchColumn()!=$log)) 
{ 
   $sql = "INSERT INTO `depositer` (`username`,`Name`,`Surname`,`Second_name`, `Address`, `Tel_num`, `Pas_num`, `password`) VALUES (?,?,?,?,?,?,?,?)";
  $statement = $db->prepare($sql);
  $statement->execute([$log,$name,$surname,$second_name, $address, $tel_num,$pass_num,$pass]);
  header('Location: registerhtml.php');
} 
else 
{ 
  echo "Такой пользователь уже существует";
}
exit();
?>