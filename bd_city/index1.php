<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> Сведения о населенных пунктах </title> </head>
  
    <h2>Список населенных пунктов:</h2>
        <style>
      #zatemnenie {
        background: rgba(102, 102, 102, 0.5);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: none;
      }
      #okno {
        width: 300px;
        height: 50px;
        text-align: center;
        padding: 15px;
        border: 3px solid #0000cc;
        border-radius: 10px;
        color: #0000cc;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        background: #fff;
      }
      #zatemnenie:target {display: block;}
      .close {
        display: inline-block;
        border: 1px solid #0000cc;
        color: #0000cc;
        padding: 0 12px;
        margin: 10px;
        text-decoration: none;
        background: #f2f2f2;
        font-size: 14pt;
        cursor:pointer;
      }
      .close:hover {background: #e6e6ff;}
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
                    echo "<td><a href='#zatemnenie<?php echo $id?>;'>$id</a></td><td><a href='#zatemnenie?var=123'>$name</a></td><td>$type</td><td>$square</td><td>$population</td><td>$region</td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">Редактировать</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">Удалить</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>Всего: $counter </p>");
            
        ?>
    
        <div id="zatemnenie">
      <div id="okno">
            <form action='save_edit.php' method='get'>
            <?php

          $mysqli = new mysqli("localhost", "f0656534_noskov_internet_prog", "12345", "f0656534_noskov_internet_prog");
            if ($mysqli->connect_errno) {
                echo "Не удалось подключиться к БД";
            }
                // const article = document.querySelector('#id');
                
                 $id1 = $_POST['id'];

                $result = $mysqli->query("SELECT id, name, type, square, population, region FROM city WHERE id='$id1'");

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
                print "<input type='hidden' name='id' size='30' value='$id1'>";
            ?>
            <p><input type='submit' name='save' value='Сохранить'></p>
        </form>
        <a href="#" class="close">Закрыть окно</a>
      </div>
    </div>
    
<script type="text/javascript">
   function click(){
    return event.srcElement.id;
   }
</script>
    
    <button style='color: black' onclick="window.location.href='new.php'">Добавить город</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">Вернуться в меню</button></td>
</html>