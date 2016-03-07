<?php

namespace Src;

class FizzBuzz
{
    public function __construct()
    {
    }

    public function run(){
        for($i = 0; $i <= 100; $i += 1){
            echo $this->getAnswer($i) . PHP_EOL;
        }
    }

    public function getAnswer($n){
        $result = '';

        $s = (string) $n;

        if($n % 3 == 0 || in_array('3', str_split($s))){
            $result .= 'Fizz';
        }

        if($n % 5 == 0 || in_array('5', str_split($s))){
            $result .= 'Buzz';
        }

        if(empty($result)){
            $result = $n;
        }

        return $result;
    }
}