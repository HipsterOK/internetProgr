<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

    $id = $_GET['id'];
    $id_shop = $_GET['id_shop'];
    $id_city = $_GET['id_city'];
    $prod = $_GET['prod'];
    $bal = $_GET['bal'];
    $direct = $_GET['direct'];
    $adress = $_GET['adress'];
    
$result = $mysqli->query("INSERT INTO tochk SET id='$id', id_shop='$id_shop',
id_city='$id_city',  prod='$prod', 
bal='$bal', direct='$direct', adress='$adress'");
    header("Location: index.php");
    exit;
?>