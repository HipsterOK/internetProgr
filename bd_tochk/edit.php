<html>
    <head> <title> �������������� ������</title> </head>
    <body>
        <form action='save_edit.php' method='get'>
            <?php

            mysql_connect("localhost", "root", "", "noskov_internet_prog") or die ("���������� 
������������ � �������");
mysql_query("SET NAMES cp1251");
mysql_select_db("noskov_internet_prog") or die("��� ����� �������!");


                $id = $_GET['id'];

                $result = mysql_query("SELECT id, id_shop, city, prod, bal, direct, adress, FROM tochk WHERE id='$id'");

                if ($result && $st = $result->fetch_array()){
                    $id_shop = $st['id_shop'];
                    $city = $st['city'];
                    $prod = $st['prod'];
                    $bal = $st['bal'];
                    $direct = $st['direct'];
			    $adress = $st['adress'];
                }

                print "������� <input name='id_shop' size='50' type='varchar' value='$id_shop'>";
                print "<br>����� <input name='city' size='50' type='varchar' value='$city'>";
                print "<br>����� ������ <input name='prod' size='30' type='integer' value='$prod'>";
                print "<br>�������� ������ <input name='bal' size='11' type='integer' value='$bal'>";
			print "<br>��� ��������� <input name='direct' size='11' type='varchar' value='$direct'>";
                print "<br>����� <input name='adress' size='50' type='varchar' value='$adress'>";
                print "<input type='hidden' name='id' size='30' value='$id' value='$id'>";
            ?>
            <p><input type='submit' name='save' value='���������'></p>
        </form>
        <p><button style='color: blue' onclick="window.location.href='index.php'">��������� � ������ </button></td></p>
    </body>
</html>