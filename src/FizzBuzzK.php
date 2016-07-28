<?php


namespace Src;


class FizzBuzzK
{
    public function getAnswer($v){
        if(($v % 3) == 0 && ($v % 5) == 0){
            return 'FizzBuzz';
        }

        if(($v % 3) == 0) {
            return 'Fizz';
        }

        if(($v % 5) == 0) {
            return 'Buzz';
        }

        return $v;
    }

    public function answer($v){
        $fizz = ($v % 3);
        $buzz = ($v % 5);
        $fizzbuzz = $fizz + $buzz;

        switch(true){
            case ($fizzbuzz == 0):
                return 'FizzBuzz';
            break;
            case ($buzz == 0):
                return 'Buzz';
            break;
            case ($fizz == 0):
                return 'Fizz';
            break;
            default:
                return $v;
            break;
        }
    }

    public function result($v){
        $fizz = ($v % 3);
        $buzz = ($v % 5);

        if($fizz > 0 && $buzz > 0){
            return $v;
        }

        $result = '';
        if($fizz == 0){
            $result .= 'Fizz';
        }

        if($buzz == 0){
            $result .= 'Buzz';
        }

        return $result;

    }
}