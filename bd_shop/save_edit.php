<html> <body>
<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("���������� 
������������ � �������");
 mysql_query('SET NAMES cp1251'); // ��� ���������
 mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");

 $zapros="UPDATE shop SET id='" . $_GET['id']
."', name='".$_GET['name']."', inn='".$_GET['inn']. "' WHERE id=" .$_GET['id'];

 mysql_query($zapros);

if (mysql_affected_rows()>0) {
 echo '��� ���������. <a href="index.php"> ��������� � ������ 
</a>'; }
 else { echo '������ ����������. <a href="index.php"> 
��������� � ������</a> '; }
?>
</body> </html>