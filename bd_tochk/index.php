<html>
    <head> <title> Сведения о точках продаж </title> </head>
    <h2> Список точек продаж  </h2>
    
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
                    echo "<td><a>$id</a></td><td><a href='?id=$id&name=shop#openModal'>$shop</a></td><td><a href='?id=$id&name=city#openModal'>$city</a></td><td><a href='?id=$id&name=prod#openModal'>$prod</a></td><td><a href='?id=$id&name=bal#openModal'>$bal</a></td>
                    <td><a href='?id=$id&name=direct#openModal'>$direct</a></td><td><a href='?id=$id&name=adress#openModal'>$adress</a></td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color: black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";

                    $counter++;
                }
            }
            print "</table>";
            print("<p>Всего:  $counter </p>");
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
$vid=$_GET['name'];
$result = $mysqli->query("SELECT tochk.id, 
        shop.id as id_shop, shop.name as name_shop,
        city.id as id_city, city.name as name_city,
        prod, bal, direct, adress
        FROM tochk
        LEFT JOIN shop ON tochk.id_shop=shop.id
        LEFT JOIN city ON tochk.id_city=city.id
        WHERE tochk.id=$id1");
    if ($result && $st = $result->fetch_array()) {
            $id = $st['id'];
            $id_shop = $st['id_shop'];
            $name_shop = $st['name_shop'];
            $id_city = $st['id_city'];
            $name_city = $st['name_city'];
            $prod = $st['prod'];
            $bal = $st['bal'];
            $direcy = $st['direct'];
            $adress = $st['adress'];
        }

  switch ($vid) {
    case shop:
        $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br>СЕТЬ: <select name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        
        if ($result){
        while ($row = $result->fetch_array()){
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value='$id'>$name</option>";
        }
        }
        echo "</select>";
        
        $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br><select hidden name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        
        print "<br><input type='hidden' name='prod' size='11' type='int'  value='$prod'>";
        print "<br><input type='hidden' name='bal' size='11' type='int'  value='$bal'>";
        print "<br><input type='hidden' name='direct' size='50' type='varchar' value='$direct'>";
        print "<br><input type='hidden' type='varchar' name='adress' size='50' value='$adress'>";
        break;
        
        case city:
             $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br>ГОРОД: <select name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        
        if ($result){
        while ($row = $result->fetch_array()){
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value='$id'>$name</option>";
        }
        }
        echo "</select>";
        
            
              $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br><select hidden name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        echo "</select>";
        
       
         print "<br><input type='hidden' name='prod' size='11' type='int'  value='$prod'>";
        print "<br><input type='hidden' name='bal' size='11' type='int'  value='$bal'>";
        print "<br><input type='hidden' name='direct' size='50' type='varchar' value='$direct'>";
        print "<br><input type='hidden' type='varchar' name='adress' size='50' value='$adress'>";
            break;
            
        case prod:
             $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br><select hidden name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        echo "</select>";
        
         $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br><select hidden name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        echo "</select>";
        
        print "<br>Объем продаж: <input name='prod' size='11' type='int'  value='$prod'>";
        print "<br><input type='hidden' name='bal' size='11' type='int'  value='$bal'>";
        print "<br><input type='hidden' name='direct' size='50' type='varchar' value='$direct'>";
        print "<br><input type='hidden' type='varchar' name='adress' size='50' value='$adress'>";
            break;
            
        case bal:
              $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br><select hidden name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        echo "</select>";
        
         $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br><select hidden name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        echo "</select>";
        
        print "<br><input input type='hidden' name='prod' size='11' type='int'  value='$prod'>";
        print "<br>Торговый баланс: <input name='bal' size='11' type='int'  value='$bal'>";
        print "<br><input type='hidden' name='direct' size='50' type='varchar' value='$direct'>";
        print "<br><input type='hidden' type='varchar' name='adress' size='50' value='$adress'>";
            break;
                
        case direct:
            $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br><select hidden name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        echo "</select>";
        
         $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br><select hidden name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        echo "</select>";
        
        print "<br><input input type='hidden' name='prod' size='11' type='int'  value='$prod'>";
        print "<br><input type='hidden' name='bal' size='11' type='int'  value='$bal'>";
        print "<br>ФИО директора: <input name='direct' size='50' type='varchar' value='$direct'>";
        print "<br><input type='hidden' type='varchar' name='adress' size='50' value='$adress'>";
            break;
            
        case adress:
            $result = $mysqli->query("SELECT id, name FROM shop 
                                    WHERE id <> $id_shop ");
        echo "<br><select hidden name='id_shop'>";
        echo "<option selected value=' $id_shop'>$name_shop</option>";
        echo "</select>";
        
         $result = $mysqli->query("SELECT id, name FROM city 
                                WHERE id <> '$id_city'");
        echo "<br><select hidden name='id_city'>";
        echo "<option selected value='$id_city'>$name_city</option>";
        echo "</select>";
        
        print "<br><input input type='hidden' name='prod' size='11' type='int'  value='$prod'>";
        print "<br><input type='hidden' name='bal' size='11' type='int'  value='$bal'>";
        print "<br><input type='hidden' name='direct' size='50' type='varchar' value='$direct'>";
        print "<br>Адрес: <input  type='varchar' name='adress' size='50' value='$adress'>";
            break;
  }
  
print "<input type='hidden' name='id' size='11' value='$id1'>";
print "<input type='submit' name='save' value='Сохранить'>";

print "<p><a href='index.php'> Вернуться к списку  </a>";
?>
</form>
    </div>
</div>
        
    <button style='color: blue' onclick="window.location.href='new.php'">Добавить </button></td>
    <button style='color: blue' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>
