<?php


if (isset($_GET['lang'])) { //сработала переключалка
  setcookie("lang", $_GET['lang']);
  include "lang/".$_GET['lang'].".php";
} else if (isset($_COOKIE['lang'])) { //нет, записан ли яз в брауз
  include "lang/".$_COOKIE['lang'].".php";
} else { //по умолч
  include "lang/ru.php";
}


?>