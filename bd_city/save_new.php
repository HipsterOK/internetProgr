<?php
$mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
$id = $_GET['id'];    
$name = $_GET['name'];
$type = $_GET['type'];
$square = $_GET['square'];
$population = $_GET['population'];
$region = $_GET['region'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO city SET id='$id', name='$name', type='$type', 
square='$square', population='$population',  region ='$region'");
// если нет ошибок при выполнении запроса
    if ($result){
    print "<p>Внесение данных прошло успешно!";
    header("Location: index.php");
    exit;
}
else{
    print "Ошибка сохранения <a href='city.php'> Вернуться к списку </a>";
    }
?>