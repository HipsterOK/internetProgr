<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("���������� 
������������ � �������");
 mysql_query('SET NAMES cp1251'); // ��� ���������
 mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");

 $zapros="DELETE FROM tochk WHERE id=" . $_GET['id'];
mysql_query($zapros);
header("Location: index.php");
 exit;
?>