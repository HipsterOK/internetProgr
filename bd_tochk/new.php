<html>
<head> <title> Добавление нового магазина</title> </head>
<body>
<H2>Вводите данные</H2>
<form action="save_new.php" metod="get">
    ИД <input name="id" size="11" type="integer">
    <br>Магазин <input name="id_shop" size="50" type="varchar">
    <br>Город <input name="city" size="50" type="varchar">
    <br>Объем продаж <input name="prod" size="30" type="integer">
    <br>Торговый баланс <input name="bal" size="11" type="integer">
    <br>ФИО директора <input name="direct" size="11" type="varchar">
    <br>Адрес <input name="adress" size="50" type="varchar">
<p>
    <input name="add" type="submit" value="Добавить">
    <input name="b2" type="reset" value="Очистить">
</p>
</form>
<p><a href="index.php"> Вернуться к списку</a> </p>
</body>
</html>