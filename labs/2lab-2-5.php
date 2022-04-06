<HTML>
<TITLE> Носков С.К. </TITLE>
<?
echo '6 вариант <br>';
$a=rand (-10,10);
$b=rand (-10,10);
$z=f($a,pow($b,8)-pow($a,7))+f(pow($a,10)-pow($b,8), $b);
function f($u,$t){
if ($u>=0 and $t>=0)
return $u + $t;
elseif ($u<0 and $t>=0)
return pow ($u,2)+$t;
elseif ($u>=0 and $t<0)
return $u - 2 * $t;
elseif ($u<0 and $t<0)
return $t + 3 * $u / $u * $t;
}
echo 'Ответ: <br>'.$z;
echo '<br>';

echo '12 вариант <br>';
$a1=rand (-10,10);
$b1=rand (-10,10);
settype ($z1, float);
$z1=cos(f1(pow($a1,2),$b1))+sin(f1($b1,$a1))*sin(f1($b1,$a1));
function f1($u1,$t1){
if ($u1<= -$t1)
return $u1*log10($u1)+exp($t1 - 1);
elseif ($u1<$t1 && $u1>-$t1)
return 2*$u1*$t1;
elseif ($u1>$t1)
return cos($u1) * cos($u1)+((pow($t1,2))/5);
}
echo "Ответ: ". $z1;
?>
</HTML>