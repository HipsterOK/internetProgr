<HTML>
<BODY>
<H1> ������� 3 </H1>
<FORM action="<?php print $PHP_SELF ?>" method="post">
<p>�����������: <INPUT type="text" name="sentence" maxlenght="40"></p>
<p>�����: <INPUT type="text" name="letter" maxlenght="40"></p>
<p><INPUT type="submit" name="count" value="���������"></p>
</FORM>
<?php
if(isset($_POST["count"])){
$sentence=trim($_POST["sentence"]);
$letter=trim($_POST["letter"]);

if(empty($letter) || empty($sentence)){
echo "��������� ����";
return;
}
$words=mb_split(" ",$sentence);
$counter=0;
for($c=0;$c<count($words);$c++){
if(mb_stripos($words[$c], $letter)===0){
$counter++;
}
}
echo "���������� ���� �� ��� �����: $counter";
}
?>
</BODY>
</HTML>