<?php
$mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "�� ������� ������������ � ��";
            }
$id = $_GET['id'];    
$name = $_GET['name'];
$type = $_GET['type'];
$square = $_GET['square'];
$population = $_GET['population'];
$region = $_GET['region'];

// ���������� �������
$result = $mysqli->query("INSERT INTO city SET id='$id', name='$name', type='$type', 
square='$square', population='$population',  region ='$region'");
// ���� ��� ������ ��� ���������� �������
    if ($result){
    print "<p>�������� ������ ������ �������!";
    header("Location: index.php");
    exit;
}
else{
    print "������ ���������� <a href='city.php'> ��������� � ������ </a>";
    }
?>