<?php session_start();
$log=$_SESSION['log']?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Поиск Алкоголя</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>

  .container {
    padding-top: 10px;
  }
  ul li {
    list-style: none;
    padding: 10px;
  }
  li {
    
  }
    .delete {
      margin-left: 50px;
    }
    .task {
      padding-right: 50px;
    }
  </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col col-sm-6">
      <div class="jumbotron text-center">
        <h2>Страница пользователя <?php echo "$log"?> <br>
        </h2>
        <a href="index.php"><button type="button" class="btn btn-link btn-sm">Назад</button></a>
      </div>
               
              <?php
    $directory = "./".$log."";    // Папка с изображениями
    $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
    $file_parts = array();
      $ext="";
      $title="";
      $i=0;
    //пробуем открыть папку
      $dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");
    while ($file = readdir($dir_handle))    //поиск по файлам
      {
      if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки
      $file_parts = explode(".",$file);          //разделить имя файла и поместить его в массив
      $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение


      if(in_array($ext,$allowed_types))
      {
      echo ''.$file.'
      <div class = "blok_img" >
                <img src="'.$directory.'/'.$file.'" class="pimg" align="left" height="85px" width="150px" title="'.$file.'" />
                
            </div>';
     $i++;
      }

      }
    closedir($dir_handle);  //закрыть папку
   // ini_set('display_errors','Off');
    ?>
            
            </div>
          </div>
        </div>
    </div>
    <hr>
      
      </div>
    </div>
</div>
</body>
</html>

