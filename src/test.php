<?php

namespace CodingTest;

/**
 * Description of test
 *
 * @author Aditya Mittal
 */
class test {

    /**
     * Given an unsorted array of positive integers
     * count how many sets can satisfy the triangle inequality
     * 
     * Performance of my algorithm is nLogn
     * 
     * Note that after sorting if we loop from start to end where a,b,c are in sorted order then we only need to ensure a + b > c
     * because b is greater than a and c is greater than b through sorting so a + c > b; and b + c > a is given
     * 
     * @author Aditya Mittal
     */
    public function question1($input) {

        //validate and prepare inputs - not testing element uniqueness (assumed in question though)
        if (!is_array($input)) {
            throw new Exception("Input must be an array of integers greater than 0");
        }
        sort($input);
        if ($input[0] <= 0) {
            throw new Exception("Input must be an array of integers greater than 0");
        }
        $length = count($input);
        $total = 0; //total

        for ($i = 0; $i <= $length - 3; $i++) { //index for value of a
            for ($j = $i + 1; $j <= $length - 2; $j++) { //index for value of b
                $sumab = $input[$i] + $input[$j]; //a + b
                $total += $this->largestIndexLessThan($input, $length, $sumab) - $j; //count values where c < a + b
            }
        }

        return $total;
    }

    /**
     * Given a sorted array and a value, we will binary search to find the index of the largest value less than the value
     * @param $array - must be sorted
     * @param $n - length of the array since I already calculated it
     * @param $target - a threshold value
     * 
     * Pretend everything below threshhold is 0 and everything above is 1 
     * and the goal is to find the index of the last 0 with binary search
     * 
     */
    public function largestIndexLessThan($arr, $n, $target) {
        $low = (int) 0; //lowest index
        $high = (int) $n - 1; //highest index
        while ($low != $high) {
            $mid = (int) round(($low + $high) / 2); // Or a fancy way to avoid int overflow and floats
            if ($arr[$mid] >= $target) {
                /* This index, and everything above it, must not be the last element
                 * less than what we're looking for because this element is no less
                 * than the target.
                 */
                $high = $mid - 1;
            } else {
                $low = $mid; //Move low pointer up to the midpoint since we're less than target
            }
        }
        /* We have converged, so return the index */
        return $low;
    }

    /**
     * Given an integer, give it as words in English
     * 
     * @param $n - the integer
     * @author Aditya Mittal
     */
    public function question2($input) {
        //validate and prepare inputs - not testing element uniqueness (assumed in question though)
        if (!is_int($input) || $input > 1000000000 || $input < -1000000000) {
            throw new \Exception("Input must be an integer in range negative 1 billion to positive 1 billion");
        }

        //let's prepare a terminology table up to billion
        $terminology = [
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'forty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion'
        ];

        //init and take care of negative
        $string = $input < 0 ? "negative " : '';
        $n = abs($input); //absolute value
        //since terminology table is a hash table if number is in it we can return it in O(1)
        if (isset($terminology[$n])) {
            $one = "";
            /**
             * Note we don't say 'one ten', but we say 'one hundred, one thousand, one million, one billion
             */
            if(in_array($n, [1000000000, 1000000, 1000, 100])){
                $one = " one ";
            }
            return trim($string . $one . $terminology[$n]);
        }

        foreach ([1000000000, 1000000, 1000, 100, 10] as $x) {
            $xword = $terminology[$x];
            if ($n > $x) {
                $howManyX = (int) ($n / $x); //How many thousands? or millons? or hundreds?
                $remainder = $n % $x;
                /**
                 * tens are different because we don't say 35 as 'three tens and five' but above hundred we have the recursive pattern
                 */
                if ($x == 10) {
                    $xword = $terminology[10 * $howManyX];
                    $prefix = $xword;
                }
                else {
                    $prefix = $this->question2($howManyX) . " $xword";
                }
                $string .= $prefix." ".$this->question2($remainder);
                return trim($string);
            }
        }

        return trim($string);
    }

    /**
     * Just for quickly printing while testing
     * @param type $obj
     */
    public function quickWrite($obj) {
        fwrite(STDOUT, print_r($obj, true));
    }

}
