<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> Сведения о точках продаж</title> </head>

    <h2>Список точек:</h2>
    <table border="1">
        <tr>
            <th> ИД </th><th> Магазин </th> <th> Город </th>
            <th> Объем продаж </th> <th> Торговый баланс </th> <th> ФИО директора</th> <th> Адрес</th> 

        </tr>
        <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("Невозможно 
подключиться к серверу");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("Нет такой таблицы!");
            // Запрос на выборку сведений о пользователях
            $result = mysql_query("SELECT id, id_shop, city, prod, bal, direct, adress FROM tochk");

            $counter=0;
            if ($result){
                while ($row = mysql_fetch_array($result)){
                    $id = $row['id'];
                    $id_shop = $row['id_shop'];
                    $city = $row['city'];
                    $prod = $row['prod'];
                    $bal = $row['bal'];
                    $direct = $row['direct'];
				$adress = $row['adress'];

                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$id_shop</td><td>$city</td><td>$prod</td><td>$bal</td><td>$direct</td><td>$adress</td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего: $counter </p>");
        ?>
    <button style='color: black' onclick="window.location.href='new.php'">Добавить точку</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>