<?php session_start();
 $log=$_SESSION['log'];
 $db_host = "localhost";
 $db_username = "root";
 $db_pass = "";
 $db_name = "bank";
 $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['deposit_choice']))
{
	$id = $_POST['deposit_choice'];
    $_SESSION['deposit_id'] =  $id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Депозит</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      padding-top: 20px;
    }
  </style>
</head>
<body>
<div class="container">
            <div class="card-body">
            <form action="insertDeposit.php"  method="post">
              <input type="number" name="days" class="form-control" placeholder="Кол-во дней">
              <input type="number" name="sum" class="form-control" placeholder="Сумма депозита">
              <hr>
              <button id="sus" class="btn btn-lg btn-warning btn-block text-white" type="submit">Внести</button>
              </form>
    </div>
</div>  
<?php } 
else 
header ('Location: chooseDeposit.php'); 
?>
</body>
</html>