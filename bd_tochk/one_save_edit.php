<html>
<body>
<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

$id = $_POST['id'];
$id_shop = $_POST['id_shop'];
$id_city = $_POST['id_city'];
$prod = $_POST['prod'];
$bal = $_POST['bal'];
$direct = $_POST['direct'];
$adress = $_POST['adress'];
$request ="UPDATE tochk SET id_shop='$id_shop',id_city='$id_city', 
prod='$prod', bal='$bal', 
direct='$direct', adress='$adress'
WHERE id='$id'";
$result = $mysqli->query($request);
// if ($result) {
// echo 'Все сохранено. <a href="index.php"> Вернуться к списку  </a>';
// }
// else {
// echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку</a> ';
// }
?>
</body>
</html>