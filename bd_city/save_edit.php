<html> <body>
<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений о пользователях
             $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city");

    $id = $_GET['id'];

    $name = $_GET['name'];
    $type = $_GET['type'];
    $square = $_GET['square'];
    $population = $_GET['population'];
    $region = $_GET['region'];

    $result = $mysqli->query("UPDATE city1
        SET name='$name', type='$type', square='$square',
        population='$population', region='$region' WHERE id='$id'"
    );

    header("Location: city.php");
    exit;
?>
</body> </html>