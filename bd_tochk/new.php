<html>
    <head> <title> Добавление новой  </title> </head>
    <body>
        <H2>Добавление новой </H2>
        <form action="save_new.php" method="get">
            <br>Ид: <input name="id" size="11" type="integer">
                        <?php
                $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }


                // Получение данных shop
                $result = $mysqli->query("SELECT id, name FROM shop");
                echo "<br>Shop <select name='id_shop'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";

                // Получение данных о city
                $result = $mysqli->query("SELECT id, name FROM city");
                echo "<br>City <select name='id_city'>";

                if ($result){
                    while ($row = $result->fetch_array()){
                        $id = $row['id'];
                        $name = $row['name'];

                        echo "<option value='$id'>$name</option>";
                    }
                }
                echo "</select>";
            ?>
            <br>Объем продаж: <input name="prod" size="11" type="integer">
            <br>Торговый баланс <input name="bal" size="11" type="integer">
            <br>ФИО Директора <input name="direct" size="50" type="varchar">
            <br>Адрес: <input name="adress" size="50" type="varchar">
            <p>
                <input name="add" type="submit" value="Добавить">
                <input name="b2" type="reset" value="Очистить">
            </p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">Вернуться к списку </button></td></p>
    </body>
</html>