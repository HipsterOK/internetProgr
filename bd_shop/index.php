<html>
    <head> <title> Сведения о сети магазинов </title> </head>

    <h2>Список магазинов:</h2>
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
        <th> ИД </th><th> Название </th> <th> ИНН </th>
        </tr>
        <?php
            $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

            // Запрос на выборку сведений 
            $result = $mysqli->query("SELECT id, name, inn FROM shop");
            $counter=0;
            if ($result){
                while ($row = $result->fetch_array()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $inn = $row['inn'];
                    $counter++;
                    echo "<tr>";
                    echo "<td><a>$id</a></td><td><a href='?id=$id&name=name#openModal'>$name</a></td><td><a href='?id=$id&name=inn#openModal'>$inn</a></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего сетей магазинов: $counter </p>");
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


                $id1 = $_GET['id'];
                $vid = $_GET['name'];

                $result = $mysqli->query("SELECT id, name, inn FROM shop WHERE id='$id1'");

                if ($result && $st = $result->fetch_array()){
                    $name = $st['name'];
                    $INN = $st['inn'];
                }
 switch ($vid) {
    case name:
           print "Название <input name='name' size='50' type='varchar' value='$name'>";
            print "<br><input type='hidden' name='inn' size='50' type='integer' value='$inn'>";
        break;
    case inn:
        print "Название <input type='hidden' name='name' size='50' type='varchar' value='$name'>";
            print "<br>ИНН<input  name='inn' size='50' type='integer' value='$inn'>";
        break;
 }
                
                print "<input type='hidden' name='id' size='30' value='$id1'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
    </div>
</div>
        
    <button style='color: black' onclick="window.location.href='new.php'">Добавить магазин</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>