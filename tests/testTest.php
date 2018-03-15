<?php

namespace CodingTest;

require_once 'src/test.php';

use PHPUnit\Framework\TestCase;

/**
 * Description of testTest
 *
 * @author Aditya Mittal
 */
class testTest extends TestCase {

    public function testQuestion1() {
        $input = [2, 5, 4, 3];
        $test = new test();
        $expected = 3; //given in the question

        $actual = $test->question1($input);
        $this->assertEquals($expected, $actual);

        $input = [2, 3, 5, 7, 8];
        $test = new test();
        $expected = 4; //valid entries are [2,5,8],[3,5,7],[3,7,8],[5,7,8]

        $actual = $test->question1($input);
        $this->assertEquals($expected, $actual);

        $input = [2, 5, 4, 3, 8, 9]; //sorted is [2,3,4,5,8,9]
        $test = new test();
        $expected = 8; //valid entries are [2,3,4],[2,4,5],[2,8,9],[3,4,5],[3,8,9],[4,5,8],[4,8,9],[5,8,9]

        $actual = $test->question1($input);
        $this->assertEquals($expected, $actual);
    }

    public function testLargestIndexLessThan() {
        //test a normal case
        $input = [1, 2, 3, 5, 6, 7, 8, 9, 10];
        $target = 8;
        $n = count($input);

        $expected = 5;

        $test = new test();
        $actual = $test->largestIndexLessThan($input, $n, $target);

        $this->assertEquals($expected, $actual);

        //test a number higher than anything in the array - all numbers are lower
        $input = [1, 2, 3, 5, 6, 7, 8, 9, 10];
        $target = 48;
        $n = count($input);

        $expected = 8;

        $actual = $test->largestIndexLessThan($input, $n, $target);

        $this->assertEquals($expected, $actual);
    }

    //Numbers to words
    public function testQuestion2() {
        $test = new test();
        $testCases = [
            19 => 'nineteen',
            123 => 'one hundred twenty three',
            -1100 => 'negative one thousand one hundred',
            76000123 => 'seventy six million one hundred twenty three',
            234234 => "two hundred thirty four thousand two hundred thirty four",
            474534345 => "four hundred seventy four million five hundred thirty four thousand three hundred forty five",
            234234 => "two hundred thirty four thousand two hundred thirty four",
            1235 => "one thousand two hundred thirty five",
            3435634 => "three million four hundred thirty five thousand six hundred thirty four",
            0 => "zero"
        ];

        foreach ($testCases as $k => $v) {
            $actual = $test->question2($k);
            $this->assertEquals($v, $actual);
        }
    }

}
