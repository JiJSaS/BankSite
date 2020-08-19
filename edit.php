<?php session_start();
//ini_set('display_errors','Off');
//error_reporting('E_ALL');
$con=3; 
$_SESSION['con']=$con;
require 'configDB.php';
$alconame = $_POST['add'];
$_SESSION['alconame'] = $alconame;
$_SESSION['log']=$log;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Поиск Алкоголя</title>
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
      <div class="col col-sm-6">
        <div class="card">
          <div class="card-header bg-primary text-white">

            <h1 class="text-center">Панель Админа</h1>
            <h3 class="text-center">Введите описание и добавьте фото</h3>
          </div>

            <div class="card-body">

  <form method="post" enctype="multipart/form-data">
  <p><textarea name="desc" cols="68" rows="6" name="desc"></textarea></p><br><br>
  
  <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> 
  <input class="btn btn-lg btn-primary btn-block text-white" type="file" name="uploadfile"> <br> <br>

   <?php
$dir="./".$alconame."/";//папка
$files1= array_diff(scandir($dir), array('..', '.'));

echo '<br>';

echo '<input class="btn btn-lg btn-primary btn-block text-white" type="submit" name="add" value="Добавить фото" >';
$dir="./".$alconame."/";
if (isset($_POST['del'])) {
  foreach($_POST as $k){
    unlink($dir.'/'.$k);
    header("Location: /");
    }   
}
if(isset($_POST['add'])){
header("Location: addbd.php");

}
?>

  </form>


 

<br>
<br>

  <?php
  require 'configDB.php';
  $uploaddir = "./".$alconame."/";  //Куда будет загружаться файл
  $uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);  //Переменная загрузки файла связывается с переменной, куда загружаем, basename - возваращет имя файла
  if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) { //Копируем файл
      echo "Файл  (" .$_FILES['uploadfile']['name']. ") успешно загружен!";
      echo '<br>';
      echo '<h3>Списо файлов: </h3>';

      if ($filelist = opendir($uploaddir)) {
          while ($entry = readdir($filelist)) {
          echo $entry."<br>";
          } 
      }
  } else {
    echo "";
  }

  if ($_FILES['uploadfile']['name'] > 1000000) {  // если больше чем 1 000 000, файл слишком большой
      echo "Превышен размер файла";
    }
   ?>
  </div>
            </form>

            <a href="admin.php"><button class="btn btn-lg btn-primary btn-block text-white" type="submit">Назад</button></a><br><br>
          
            </div> 
          </div>
        </div>
    </div>
</div>  
</body>
</html>


 <?php 
 //ini_set('display_errors','Off');
 ?>