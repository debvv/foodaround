<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "foodaround_db";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
  // $conn->query(" SET NAMES 'utf8' "); // Установка кодировки(добавлено!изменена структура таблицы ,многоязычность)
?>