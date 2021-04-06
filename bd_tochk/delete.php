<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
 mysql_query('SET NAMES cp1251'); // Тип кодировки
 mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");

 $zapros="DELETE FROM tochk WHERE id=" . $_GET['id'];
mysql_query($zapros);
header("Location: index.php");
 exit;
?>