<HTML>
<BODY>
<H1> Анкета "Ваш харктер" </H1>
<FORM method="post"action="<?php print $PHP_SELF ?>">
Введите имя:
	<INPUT type="text" name="userName" maxlenght="40">

	<?php
		require_once "./s3-5-script.php";
		build_radio();
	?>

	<INPUT type="submit" name="check" value="Принять">
</FORM>

<?php
	$yes=array(3,9,10,13,14,19);
	$no=array(1,2,4,5,6,7,8,11,12,15,16,17,18,20);
	$result=0;

if(isset($_POST["check"])){
	$name=trim($_POST["userName"]);
	if(!empty($name)){
		for($c=0; $c< count($yes); $c++){
			if($_POST["$yes[$c]"]=="true"){
				$result++;
			}
		}
	for($c=0; $c< count($no); $c++){
		if($_POST["$no[$c]"]=="false"){
			$result++;
		}
	}
echo"<p>$name, ваш результат: $result <p>";
if($result>15){
	echo"<p>У вас покладистый характер.<p>";
}
else if($result >8){
	echo"<p>Вы не лишены недостатков, но с 
вами можно ладить.<p>";
}
else{
	echo"<p>Вашим друзьям можно посочувствовать.<p>";
}
}
}
 
	?>
</BODY>
</HTML>|