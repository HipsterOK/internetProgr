
<?php
 // ����������� � ���� ������:
 mysql_connect("localhost","root","","noskov_internet_prog") or die ("���������� 
������������ � �������");
 mysql_query('SET NAMES cp1251'); // ��� ���������
 mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");
 // ������ ������� �� ���������� ������ � �������:
 $sql_add = "INSERT INTO tochk SET id='" . $_GET['id']
."', id_shop='".$_GET['id_shop']."', city='"
.$_GET['city']."', prod='".$_GET['prod'].
"', bal='".$_GET['bal'].
"', direct='".$_GET['direct'].
"', adress='".$_GET['adress']. "'";
 mysql_query($sql_add); // ���������� �������
 if (mysql_affected_rows()>0) // ���� ��� ������ ��� ���������� �������
 { print "<p>�������� ������ ������ �������.";
 print "<p><a href=\"index.php\"> ��������� � ������ 
������������� </a>"; }
 else { print "������ ����������. <a href=\"index.php\"> 
��������� � ������</a>"; }
?>