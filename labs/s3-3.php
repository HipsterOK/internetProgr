<HTML>
<BODY>
<FORM method="post"action="<?php print $PHP_SELF ?>">
����� �������� ����� �� ���������. ������� ����� ����������:
	<br><INPUT type="int" name="n">
		<br>�������:
		<br><SELECT NAME="z" SIZE "1">
	<OPTION VALUE="1" SELECTED> ������
	<OPTION VALUE="2"> ��������
	<OPTION VALUE="3"> �������
	<OPTION VALUE="4"> ���������
</SELECT>
	<p> <INPUT type="submit" name="obr" value="�����">
</FORM>
<?php
$a=1;
$arr=range(1, $_POST["n"], 1);
if (isset ($_POST["obr"])){
switch ($_POST["z"]){
case 1: 
foreach ($arr as $n =>$value){
if(($n+1)%2==0){
echo $value.'<br />';
}
}
break;

case 2: 
foreach ($arr as $n =>$value){
if(($n+1)%2!=0){
echo $value.'<br />';
}
}
break;

case 3: 
foreach ($arr as $n =>$value){
	if(($n+1)%2==0){
echo $value.'<br />';
}
}
break;

case 4: 
foreach ($arr as $n =>$value){
if(($n+1)%2==0){
echo $value.'<br />';
}
}
break;

}
}
?>
</BODY>
</HTML>|