<?php
     $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "�� ������� ������������ � ��";
            }

    $id = $_GET['id'];

    // �������� shop
    $result = $mysqli->query("DELETE FROM shop WHERE id='$id'");

    header("Location: index.php");
    exit;
?>