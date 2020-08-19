<?php session_start(); unset($_SESSION['log']); session_destroy();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Банк</title>
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
    <div class="row justify-content-center">
          	<h1>Банк</h1>
          </div>
            <div class="card-body">
            <form action="reg.php"  method="post">
              <button class="btn btn-primary btn-lg btn-block"  type="submit">Зарегистрироваться</button>
              </form>
              <hr>
            <form action="log.php"  method="post">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Войти</button>
              </form>
            </div> 
</div>	
</body>
</html>
 