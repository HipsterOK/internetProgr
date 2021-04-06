<HTML>
<HEAD><TITLE>  јЋ№ ”Ћя“ќ– </TITLE></HEAD>
<BODY>
<FORM method="post"action="<?php print $PHP_SELF ?>">
 јЋ№ ”Ћя“ќ–
<br><INPUT type="int" name="a">
<br><INPUT type="int" name="b">
<br>действие:
<br><SELECT NAME="z" SIZE "1">
<OPTION VALUE="1" SELECTED> сложить
<OPTION VALUE="2"> вычесть
<OPTION VALUE="3"> умножить
<OPTION VALUE="4"> разделить
</SELECT>
<p> <INPUT type="submit" name="obr" value="¬перед!">
</FORM>
<?
if (isset ($_POST["obr"])){
switch ($_POST["z"]){
case 1: 
echo ($_POST["a"]. "+". $_POST["b"]. "=". ($_POST["a"]+$_POST["b"]));
break;
case 2: 
echo ($_POST["a"]. "-".$_POST["b"]. "=".($_POST["a"]- $_POST["b"]));
break;
case 3: 
echo ($_POST["a"]."*". $_POST["b"]. "=".($_POST["a"]*$_POST["b"]));
break;
case 4: 
echo ($_POST["a"]. "/".$_POST["b"]. "=".($_POST["a"]/$_POST["b"]));
break;
}
}
echo ($a1 . $a2 . $a3 . $a4);
?>
</BODY>
</HTML>|