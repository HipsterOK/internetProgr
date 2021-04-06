<html> <body>
<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
 mysql_query('SET NAMES cp1251'); // Тип кодировки
 mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");

 $zapros="UPDATE tochk SET id='" . $_GET['id']
."', id_shop='".$_GET['id_shop']."', city='"
.$_GET['city']."', prod='".$_GET['prod'].
"', bal='".$_GET['bal'].
"', direct='".$_GET['direct'].
"', adress='".$_GET['adress']. "' WHERE id="
.$_GET['id'];
 mysql_query($zapros);

if (mysql_affected_rows()>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку 
</a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php"> 
Вернуться к списку</a> '; }
?>
</body> </html>