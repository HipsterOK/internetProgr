<html>
<TITLE> ������ 4 </TITLE>
<?
$c=0;
$a=0;
$b=0;
$q=rand(0,10);
echo '5 ������� <br>';
for ($i=0;$i<10;$i++) {$mass[$i]=rand(0,10);}
echo '������: ';
for ($i=0; $i<10; $i++) {echo $mass [$i], ' ' ;}
echo '<br>';
echo '������� ��������������: ';
for ($i=0; $i<$q; $i++){
$s=$s+$mass[$i];
$c++;}
echo $s/$c;
echo '<br>';
for ($i=0; $i<10; $i++){
if ($mass[$i]>$s/$c){
$a++;}
else $b++;
}
echo '������ ��. ����-��: ';
echo $a."<br />";
echo '������ ��. ����-��: ';
echo $b."<br />";

echo '12 ������� <br>';
for ($i=1;$i<11;$i++) {$miss[$i]=rand(-10,10);}
echo '�������� ������: ';
for ($i=1; $i<11; $i++) {echo $mass [$i],' ';}
echo '<br>';
echo '����������. ������: ';
for ($i=1; $i<11; $i++){
if (($mass[$i]>=0) and (($mass[$i]<1) or ($mass[$i]>4)))
$mass[$i]=1;
}
for ($i=1; $i<11; $i++) {echo $mass [$i], ' ' ;}
echo '<br>';
?>
</HTML>