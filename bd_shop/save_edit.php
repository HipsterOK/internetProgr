<?php
     $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }


    $id = $_GET['id'];
    $name = $_GET['name'];
    $inn = $_GET['inn'];
    $result = $mysqli->query("UPDATE shop SET name='$name', INN='$inn' WHERE id='$id'" );
    header("Location: index.php");
    exit;
?>