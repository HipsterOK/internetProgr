<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

$id = $_GET['id'];    
$name = $_GET['name'];
$inn = $_GET['inn'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO shop SET id='$id', name='$name', INN='$inn'");
// если нет ошибок при выполнении запроса
    if ($result){
    print "<p>Внесение данных прошло успешно!";
    header("Location: index.php");
    exit;
}
else{
    print "Ошибка сохранения <a href='index.php'> Вернуться к списку </a>";
    }
?>