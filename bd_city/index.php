<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> �������� � ���������� ������� </title> </head>

    <h2>������ ���������� �������:</h2>
    <table border="1">
        <tr>
            <th> �� </th><th> �������� </th> <th> ��� </th>
            <th> ������� </th> <th> ��������� </th> <th> ������ </th> 
        </tr>
        <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("���������� 
������������ � �������");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");
            // ������ �� ������� �������� � �������������
            $result = mysql_query("SELECT id, name, type, square, population, region FROM city");

            $counter=0;
            if ($result){
                while ($row = mysql_fetch_array($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $square = $row['square'];
                    $population = $row['population'];
                    $region = $row['region'];
                    $counter++;

                    echo "<tr>";
                    echo "<td>$id</td><td>$name</td><td>$type</td><td>$square</td><td>$population</td><td>$region</td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='edit.php?id=$id'\">�������������</button></td>";
                    echo "<td><button style='color:  black' onclick=\"window.location.href='delete.php?id=$id'\">�������</button></td>";
                    echo "</tr>";
                }
            }
            print "</table>";
            print("<p>�����: $counter </p>");
        ?>
    <button style='color: black' onclick="window.location.href='new.php'">�������� �����</button></td>
    <button style='color: black' onclick="window.location.href='../index.php'">��������� � ����</button></td>
</html>