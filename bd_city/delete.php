<?php
    $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

    $id = $_GET['id'];

    // Удаление города
    $result = $mysqli->query("DELETE FROM city WHERE id='$id'");

    header("Location: index.php");
    exit;
?>