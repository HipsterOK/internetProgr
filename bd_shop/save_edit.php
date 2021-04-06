<html> <body>
<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
 mysql_query('SET NAMES cp1251'); // Тип кодировки
 mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");

 $zapros="UPDATE shop SET id='" . $_GET['id']
."', name='".$_GET['name']."', inn='".$_GET['inn']. "' WHERE id=" .$_GET['id'];

 mysql_query($zapros);

if (mysql_affected_rows()>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку 
</a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php"> 
Вернуться к списку</a> '; }
?>
</body> </html>