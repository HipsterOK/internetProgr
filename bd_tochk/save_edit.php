<html> <body>
<?php
  mysql_connect("localhost","root","","noskov_internet_prog") or die ("���������� 
������������ � �������");
 mysql_query('SET NAMES cp1251'); // ��� ���������
 mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");

 $zapros="UPDATE tochk SET id='" . $_GET['id']
."', id_shop='".$_GET['id_shop']."', city='"
.$_GET['city']."', prod='".$_GET['prod'].
"', bal='".$_GET['bal'].
"', direct='".$_GET['direct'].
"', adress='".$_GET['adress']. "' WHERE id="
.$_GET['id'];
 mysql_query($zapros);

if (mysql_affected_rows()>0) {
 echo '��� ���������. <a href="index.php"> ��������� � ������ 
</a>'; }
 else { echo '������ ����������. <a href="index.php"> 
��������� � ������</a> '; }
?>
</body> </html>