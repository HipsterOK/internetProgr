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

                $result = mysql_query("SELECT id, name, inn, FROM shop WHERE id='$id'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $inn = $st['inn'];
                      }

                print "Название <input name='name' size='50' type='varchar' value='$name'>";
                print "<br>ИНН <input name='inn' size='30' type='integer' value='$inn'>";
                print "<input type='hidden' name='id' size='30' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">Вернуться к списку </button></td></p>
    </body>
</html>