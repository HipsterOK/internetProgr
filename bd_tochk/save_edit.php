<html>
<body>
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
$request ="UPDATE tochk SET id_shop='$id_shop',id_city='$id_city', 
prod='$prod', bal='$bal', 
direct='$direct', adress='$adress'
WHERE id='$id'";
$result = $mysqli->query($request);
if ($result) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку  </a>';
}
else {
echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку</a> ';
}
?>
</body>
</html>