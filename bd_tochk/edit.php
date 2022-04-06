<html> 
<body>
<form action='save_edit.php' method='get'>
<?php 
 $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }

$id_1 = $_GET['id'];
$result = $mysqli->query("SELECT tochk.id, 
        shop.id as id_shop, shop.name as name_shop,
        city.id as id_city, city.name as name_city,
        prod, bal, direct, adress
        FROM tochk
        LEFT JOIN shop ON tochk.id_shop=shop.id
        LEFT JOIN city ON tochk.id_city=city.id
        WHERE tochk.id=$id_1");
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

 
                //id os
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
                
        //id DS
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
print "<br>Объем продаж: <input name='prod' size='11' type='int'  value='$prod'>";
print "<br>Торговый баланс: <input name='bal' size='11' type='int'  value='$bal'>";
print "<br>ФИО директора: <input name='direct' size='50' type='varchar' value='$direct'>";
print "<br>Адрес: <input type='varchar' name='adress' size='50' value='$adress'>";
print "<input type='hidden' name='id' size='11' value='$id_1'>";
print "<input type='submit' name='save' value='Сохранить'>";

print "<p><a href='index.php'> Вернуться к списку  </a>";
?>
</form>
</body>
</html>