<html>
    <head> <title> Сведения о точках продаж </title> </head>
    <h2> Список точек продаж  </h2>
    <table border="1">
        <tr>
            <th> Ид </th> <th> Название сети магазина </th> <th> Город </th>
            <th> Объем продаж </th> <th> Торговый баланс </th> 
            <th> ФИО Директора </th> <th> Адрес </th>
        </tr>
        <?php
           $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений о пользователях
        
            // Запрос на выборку сведений 
 // Запрос на выборку сведений 
            $result = $mysqli->query("SELECT tochk.id,  
            shop.name as shop,  city.name as city, 
            tochk.prod, tochk.bal,
            tochk.direct, tochk.adress FROM tochk
            LEFT JOIN shop ON tochk.id_shop = shop.id
            LEFT JOIN city ON tochk.id_city = city.id" );


            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()) {
                    $id = $row['id'];
                    $shop = $row['shop'];
                    $city = $row['city'];
                    $prod = $row['prod'];
                    $bal = $row['bal'];
                    $direct = $row['direct'];
                    $adress = $row['adress'];

                    echo "<tr>";
                    echo "<td>$id</td><td>$shop</td><td>$city</td><td>$prod</td><td>$bal</td>
                    <td>$direct</td><td>$adress</td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего:  $counter </p>");
        ?>
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить </button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>
