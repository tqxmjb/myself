<?php

$a = array();

for($i=0;$i<500000;$i++){

$a[$i] = $i;

}

foreach($a as $i)

{

array_key_exists($i, $a);

}

?>