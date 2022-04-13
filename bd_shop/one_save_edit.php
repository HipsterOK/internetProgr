<?php
     $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }


    $id = $_POST['id'];
    $name = $_POST['name'];
    $inn = $_POST['inn'];
    $result = $mysqli->query("UPDATE shop SET name='$name', INN='$inn' WHERE id='$id'" );
?>