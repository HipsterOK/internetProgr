<HTML>
<BODY>
<H1> ������� 21 </H1>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>�����: <INPUT type="text" name="f" maxlenght="40"></p>
<p><INPUT type="submit" name="count" value="�����������"></p>
</FORM>

<?php
$str=($_POST["f"]);
$you_char="�";
$text=preg_replace("/((?:.|\n){3})/u","$1".$you_char,$str);
echo $text;
?>
</BODY>
</HTML>
