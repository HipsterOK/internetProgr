<html> <body>
<?php
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений о пользователях
             $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city");

    $id = $_POST['id'];

    $name = $_POST['name'];
    $type = $_POST['type'];
    $square = $_POST['square'];
    $population = $_POST['population'];
    $region = $_POST['region'];

    $result = $mysqli->query("UPDATE city
        SET name='$name', type='$type', square='$square',
        population='$population', region='$region' WHERE id='$id'"
    );

?>
</body> </html>