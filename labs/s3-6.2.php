<HTML>
<BODY>
<H1> ������� 9 </H1>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>�����������: <INPUT type="text" name="sentence" maxlenght="40"></p>
<p><INPUT type="submit" name="count" value="���������"></p>
</FORM>
<?php
if(isset($_POST["count"])){
$sentence=trim($_POST["sentence"]);
$words =mb_split(" ", $sentence);
$counter=0;
echo "���������� �����������: ". str_word_count($sentence, 0, '.!...?');
}
?>
</BODY>
</HTML>