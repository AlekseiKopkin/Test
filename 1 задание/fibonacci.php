<?php
$n=64;
$res = array(0,1);
for($i=0; $i < ($n-2); $i++){
    $cur = $res[$i] + $res[$i+1];
    array_push($res, $cur);
}
echo implode(", ",$res);
?>