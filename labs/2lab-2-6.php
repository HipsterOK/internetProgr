<html>
<TITLE> Носков С. К. </TITLE>
<?
echo '6 вариант <br>';
echo 'Матрица: <br>';
for ($i=1;$i<=5;$i++){
for ($j=1;$j<=5;$j++){
$mas[$i][$j]=rand(1,10);
echo (' '. $mas[$i][$j]);
}
echo '<br>';
}
echo ('Наимен. эл-т столбца: <br>');
for ($i=1;$i<=5;$i++){
$min=1000;
for ($j=1;$j<=5;$j++){
	if ($min>$mas[$j][$i]){
	$min=$mas[$j][$i];
	}
}
echo ($min. ' ');
}
echo '<br>';
echo ('Произведение наимен. эл-тов: <br>');
for ($i=1;$i<=5;$i++){
	$mult=1000;
	$count=1;
	for ($j=1;$j<=5;$j++){
if ($mult>$mas[$j][$i]){
$mult=$mas[$j][$i];
	$count=$mas[$j][$i];
	}
}
echo ($count. ' ');
}
echo '<br>';

echo '12 вариант <br>';
for ($k=0;$k<21;$k++)
{$a[$k]=rand(0,30);}
$arr=array (array ($a[0], 0,0,0,0,0),
array ($a[1], $a[2],0,0,0,0),
array ($a[3], $a[4],$a[5],0,0,0),
array ($a[6], $a[7],$a[8],$a[9],0,0),
array ($a[10], $a[11],$a[12],$a[13], $a[14],0),
array ($a[15], $a[16],$a[17],$a[18],$a[19],$a[20]));
for ($i=0;$i<6;$i++){
for ($j=0;$j<6;$j++){
echo ' '.$arr[$i][$j];
}
echo '<br />';
}
?>
</HTML>