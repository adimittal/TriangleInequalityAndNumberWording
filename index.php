<?php

require 'src/test.php';
$test = new \CodingTest\test();

//Question 1 - count sets satisfying triangle inequality
$x = [2, 5, 4, 3, 8, 9];
echo $test->question1($x);

$x = [2, 3, 5, 7, 8];
echo $test->question1($x);
echo "\n</br>\n</br>";

//Question 2 - verbalize numbers
$cases = [
    234234, 474534345, 234234, 1235, 3435634, 0
];
foreach ($cases as $case) {
    echo $case." : ".$test->question2($case) . "\n</br>";
}