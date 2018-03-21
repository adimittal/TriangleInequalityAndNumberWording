<?php

/**
 * A simple timing test to see if its better to do an isset and have just one loop or have two loops of n
 * 
 * !isset comparison with one loop of n took 0.06243896484375 seconds 
 * Two loops of size n with no comparison took 0.04578685760498 seconds
 */

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

//Let's create a large test array of size n
$n = 50000;
$r = array();
for($i = 0;$i < $n; $i++) {
    $r[] = $i;
}

$time_start = microtime_float();

//Function to time
wisset($r);

$time_end = microtime_float();
$time = $time_end - $time_start;

echo "!isset comparison with one loop of n took $time seconds\n</br>";

$time_start2 = microtime_float();

//Function to time
copyLoop($r);

$time_end2 = microtime_float();
$time2 = $time_end2 - $time_start2;

echo "two loops of size n with no comparison took $time2 seconds\n</br>";

function wisset($r) {
    $x = [];
    $s = [];
    foreach($r as $k => $v){
        if(!isset($x[$k])){
            $s[] = [$k => $v];
        }
        $x[$k] = $v;
    }
    
    return $s;
}

function copyLoop($r) {
    $x = [];
    $s = [];
    foreach($r as $k => $v){
        $x[$k] = $v;
    }
    foreach($x as $k => $v){
        $s[] = [$k => $v];
    }
    
    return $s;
}