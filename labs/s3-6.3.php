<HTML>
<BODY>
<H1> Вариант 21 </H1>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>Слово: <INPUT type="text" name="f" maxlenght="40"></p>
<p><INPUT type="submit" name="count" value="Зашифровать"></p>
</FORM>

<?php
$str=($_POST["f"]);
$you_char="Е";
$text=preg_replace("/((?:.|\n){3})/u","$1".$you_char,$str);
echo $text;
?>
</BODY>
</HTML>
