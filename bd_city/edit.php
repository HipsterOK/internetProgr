<html>
    <head> <title> Редактирование данных населенного пункта </title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");


                $id = $_GET['id'];

                $result = mysql_query("SELECT id, name, type, square, population, region FROM city1 WHERE id='$id'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $type = $st['type'];
                    $square = $st['square'];
                    $population = $st['population'];
                    $region = $st['region'];
                }

                print "Название <input name='name' size='50' type='varchar' value='$name'>";
                print "<br>Тип <input name='type' size='30' type='varchar' value='$type'>";
                print "<br>Площадь <input name='square' size='11' type='integer' value='$square'>";
                print "<br>Население <input name='population' size='20' type='integer' value='$population'>";
                print "<br>Регион <input type='varchar' name='region' size='50' value='$region'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">Вернуться к списку </button></td></p>
    </body>
</html>