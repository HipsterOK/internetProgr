<HTML>
<BODY>
<FORM method="post"action="<?php print $PHP_SELF ?>">
Введите логин:
	<INPUT type="text" name="userName" maxlenght="40">
	<INPUT type="submit" name="obr" value="Проверить">
</FORM>

<?php
$a=array("noskov","носков","админ","admin");

$passed=false;
if(isset($_POST["obr"])){
	$user_name=mb_strtolower(trim($_POST["userName"]), "UTF-8");

	for($c=0; $c< count($a); $c++){
		if($user_name==$a[$c]){
			echo "Добро пожаловать,$a[$c]!";
			$passed =true;
			break;
		}
	}

	if(!$passed){
		echo "Вы не зарегистрированный пользователь!";
	}
}
?>
</BODY>
</HTML>|