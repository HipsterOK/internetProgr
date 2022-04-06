<HTML>
<HEAD><TITLE> ??????????? </TITLE></HEAD>
<BODY>
<FORM method="post"action="<?php print $PHP_SELF ?>">
???????????
<br><INPUT type="int" name="a">
<br><INPUT type="int" name="b">
<br>????????:
<br><SELECT NAME="z" SIZE "1">
<OPTION VALUE="1" SELECTED> ???????
<OPTION VALUE="2"> ???????
<OPTION VALUE="3"> ????????
<OPTION VALUE="4"> ?????????
</SELECT>
<p> <INPUT type="submit" name="obr" value="??????!">
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