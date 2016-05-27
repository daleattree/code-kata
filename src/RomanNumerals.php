<?php


namespace Src;


class RomanNumerals
{
    const M = 1000;
    const D = 500;
    const C = 100;
    const L = 50;
    const X = 10;
    const V = 5;
    const I = 1;

    private static $map = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );

    private $answer = '';

    /**
     * RomanNumerals constructor.
     */
    public function __construct()
    {
    }

    public function translate($v){
        $this->answer = '';

        $singles = substr($v, -1);
        $tens  = 0;
        $hunderds = 0;
        $thousands = 0;

        if($v >= self::X){
            $tens = substr($v, -2, 1) * 10;
        }

        if($v >= self::C){
            $hunderds = substr($v, -3, 1) * 100;
        }

        if($v >= self::M) {
            $thousands = substr($v, 0, -3);
        }

        $letters = array_flip(self::$map);

        $this->answer .= str_repeat('M', $thousands);

        if(in_array($hunderds, self::$map)){
            $this->answer .= $letters[$hunderds];
        } else {
            $this->answer .= str_repeat('C', round($hunderds/100));
        }

        if(in_array($tens, self::$map)){
            $this->answer .= $letters[$tens];
        } else {
            $this->answer .= str_repeat('X', round($tens/10));
        }

        if(in_array($singles, self::$map)){
            $this->answer .= $letters[$singles];
        } else {
            if($singles > 5) {
                $this->answer .= $letters[5];
                $singles -= 5;
            }
            $this->answer .= str_repeat('I', $singles);
        }

        return strtolower($this->answer);
    }

    public function reduce($v) {
        $result = '';
        foreach (self::$map as $numeral => $value){
            while($v >= $value){
                $result .= $numeral;
                $v -= $value;
            }
        }
        return $result;
    }


}