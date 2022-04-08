<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> Сведения о населенных пунктах </title> </head>
  
    <h2>Список населенных пунктов:</h2>
        <style>
        .modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	display: none;
	pointer-events: none;
}

.modalDialog:target {
	display: block;
	pointer-events: auto;
}

.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
}
.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #00d9ff; }
    </style>
    
    <table border="1">
        <tr>
            <th> ИД </th><th> Название </th> <th> Тип </th>
            <th> Площадь </th> <th> Население </th> <th> Регион </th> 
        </tr>
        <?php

//             mysql_connect("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog") or die ("Невозможно 
// подключиться к серверу");
// mysql_query("SET NAMES cp1251");
// mysql_select_db("city") or die("Нет такой таблицы!");
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
            // Запрос на выборку сведений о пользователях
             $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city");

            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $square = $row['square'];
                    $population = $row['population'];
                    $region = $row['region'];
                    $counter++;

                    echo "<tr>";
                    echo "<td><a>$id</a></td><td><a href='?id=$id&name=name#openModal'>$name</a></td><td><a href='?id=$id&name=type#openModal'>$type</a></td><td><a href='?id=$id&name=square#openModal'>$square</a></td><td><a href='?id=$id&name=population#openModal'>$population</a></td><td><a href='?id=$id&name=region#openModal'>$region</a></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего: $counter </p>");
            
        ?>
    
        <div id="openModal" class="modalDialog">
    <div>

        <a href="#close" title="Закрыть" class="close">X</a>

            <form action='save_edit.php' method='get'>
            <?php

          $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
                
                 $id1 = $_GET["id"];
                $vid = $_GET["name"];

                $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city WHERE id='$id1'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $type = $st['type'];
                    $square = $st['square'];
                    $population = $st['population'];
                    $region = $st['region'];
}

                switch ($vid) {
    case name:
            print "Название <input  name='name' size='50' type='varchar' value='$name'>";
            print "<br><input type='hidden' name='type' size='30' type='varchar' value='$type'>";
            print "<br><input type='hidden' name='square' size='11' type='integer' value='$square'>";
            print "<br><input type='hidden' name='population' size='20' type='integer' value='$population'>";
            print "<br><input type='hidden' type='varchar' name='region' size='50' value='$region'>";
        break;
    case type:
       print "<input type='hidden' name='name' size='50' type='varchar' value='$name'>";
        print "<br>Тип <input  name='type' size='30' type='varchar' value='$type'>";
        print "<br><input type='hidden' name='square' size='11' type='integer' value='$square'>";
        print "<br><input type='hidden' name='population' size='20' type='integer' value='$population'>";
        print "<br><input type='hidden' type='varchar' name='region' size='50' value='$region'>";
        break;
    case square:
        print "<input type='hidden' name='name' size='50' type='varchar' value='$name'>";
        print "<br><input type='hidden' name='type' size='30' type='varchar' value='$type'>";
         print "<br>Площадь<input name='square' size='11' type='integer' value='$square'>";
         print "<br><input type='hidden' name='population' size='20' type='integer' value='$population'>";
         print "<br><input type='hidden' type='varchar' name='region' size='50' value='$region'>";
        break;
        break;
    case population:
         print "<input type='hidden' name='name' size='50' type='varchar' value='$name'>";
        print "<br><input type='hidden' name='type' size='30' type='varchar' value='$type'>";
        print "<br><input input type='hidden' name='square' size='11' type='integer' value='$square'>";
        print "<br>Население <input name='population' size='20' type='integer' value='$population'>";
        print "<br><input type='hidden' type='varchar' name='region' size='50' value='$region'>";
        break;
    case region:
         print "<input type='hidden' name='name' size='50' type='varchar' value='$name'>";
        print "<br><input type='hidden' name='type' size='30' type='varchar' value='$type'>";
        print "<br> <input type='hidden' name='square' size='11' type='integer' value='$square'>";
        print "<br> <input type='hidden' name='population' size='20' type='integer' value='$population'>";
        print "<br>Регион <input  type='varchar' name='region' size='50' value='$region'>";
        break;
}
                print "<input type='hidden' name='id' size='30' value='$id1'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
    </div>
</div>
    
</script>
    
    <button style='color: black' onclick="window.location.href='new.php'">Добавить город</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>