<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> Сведения о магазинах</title> </head>

    <h2>Список точек:</h2>
    <table border="1">
        <tr>
            <th> ИД </th><th> Название </th> <th> ИНН </th> <th> Редактировать </th> <th> Уничтожить </th>


        </tr>
        <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");
            // Запрос на выборку сведений о пользователях
            $result = mysql_query("SELECT id, name, inn FROM shop");

            $counter=0;
            if ($result){
                while ($row = mysql_fetch_array($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $inn = $row['inn'];
                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$inn</td";
echo "<tr>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего: $counter </p>");
        ?>
    <button style='color: black' onclick="window.location.href='new.php'">Добавить сеть</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>