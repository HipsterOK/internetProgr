
<?php
 // ����������� � ���� ������:
 mysql_connect("localhost","root","","noskov_internet_prog") or die ("���������� 
������������ � �������");
 mysql_query('SET NAMES cp1251'); // ��� ���������
 mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");

 // ������ ������� �� ���������� ������ � �������:
 $sql_add = "INSERT INTO shop SET id='" . $_GET['id']
."', name='".$_GET['name']."', inn='".$_GET['inn']. "'";
 mysql_query($sql_add); // ���������� �������
 if (mysql_affected_rows()>0) // ���� ��� ������ ��� ���������� �������
 { print "<p>�������� ������ ������ �������.";
 print "<p><a href=\"index.php\"> ��������� � ������ 
������������� </a>"; }
 else { print "������ ����������. <a href=\"index.php\"> 
��������� � ������</a>"; }
?>