
<?php
 // Подключение к базе данных:
 mysql_connect("localhost","root","","noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
 mysql_query('SET NAMES cp1251'); // Тип кодировки
 mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");

 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO shop SET id='" . $_GET['id']
."', name='".$_GET['name']."', inn='".$_GET['inn']. "'";
 mysql_query($sql_add); // Выполнение запроса
 if (mysql_affected_rows()>0) // если нет ошибок при выполнении запроса
 { print "<p>Внесение данных прошло успешно.";
 print "<p><a href=\"index.php\"> Вернуться к списку 
пользователей </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\"> 
Вернуться к списку</a>"; }
?>