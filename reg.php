s
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
            <h1 class="text-center">Регистрация</h1>
            <div class="card-body">
            <form action="registr.php"  method="post">
              <input type="text" name="log" class="form-control" placeholder="Логин">
              <input type="password" name="pass" class="form-control" placeholder="Пароль">
              <input type="text" name="name" class="form-control" placeholder="Имя">
              <input type="text" name="surname" class="form-control" placeholder="Фамилия">
              <input type="text" name="s_name" class="form-control" placeholder="Отчество">
              <input type="text" name="address" class="form-control" placeholder="Адрес">
              <input type="number" name="tel_num" class="form-control" placeholder="Номер Телефона">
              <input type="number" name="pas_num" class="form-control" placeholder="Серия и номер пасспорта">
              <hr>
              <button class="btn btn-lg btn-warning btn-block text-white" type="submit">Зарегистрироваться</button>
              </form>
    </div>
</div>  
</body>
</html>
 