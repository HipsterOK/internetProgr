<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "�� ������� ������������ � ��";
            }

$id = $_GET['id'];    
$name = $_GET['name'];
$inn = $_GET['inn'];

// ���������� �������
$result = $mysqli->query("INSERT INTO shop SET id='$id', name='$name', INN='$inn'");
// ���� ��� ������ ��� ���������� �������
    if ($result){
    print "<p>�������� ������ ������ �������!";
    header("Location: index.php");
    exit;
}
else{
    print "������ ���������� <a href='index.php'> ��������� � ������ </a>";
    }
?>