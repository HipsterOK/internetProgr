<HTML>
<BODY>
<H1> Вариант 9 </H1>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>Предложение: <INPUT type="text" name="sentence" maxlenght="40"></p>
<p><INPUT type="submit" name="count" value="Посчитать"></p>
</FORM>
<?php
if(isset($_POST["count"])){
$sentence=trim($_POST["sentence"]);
$words =mb_split(" ", $sentence);
$counter=0;
echo "Количество предложений: ". str_word_count($sentence, 0, '.!...?');
}
?>
</BODY>
</HTML>