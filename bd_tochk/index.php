<META content="text/html; charset=utf8" http-equiv=Content-type>
<html>
    <head> <title> �������� � ������ ������</title> </head>

    <h2>������ �����:</h2>
    <table border="1">
        <tr>
            <th> �� </th><th> ������� </th> <th> ����� </th>
            <th> ����� ������ </th> <th> �������� ������ </th> <th> ��� ���������</th> <th> �����</th> 

        </tr>
        <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("���������� 
������������ � �������");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");
            // ������ �� ������� �������� � �������������
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