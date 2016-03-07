<?php

namespace Src;


class StringCalculator
{

    private $values;

    /**
     * StringCalculator constructor.
     */
    public function __construct()
    {
        $this->values = array();
    }

    public function calculateString($string)
    {
        $string = trim($string);

        $prefix = '//';
        $delimiter = ';';
        if (substr($string, 0, 2) == $prefix) {
            $delimiter = substr($string, 2, 1);
        }

        if (is_numeric($delimiter)) {
            throw new \Exception('Invalid delimiter: ' . $delimiter);
        }

        $string = str_replace($prefix . $delimiter, '', $string);

        if (empty($string)) {
            return 0;
        }

        $numbers = explode($delimiter, $string);
        $total = array_sum($numbers);

        return $total;
    }

    public function calculateRegex($string)
    {
        $prefix = '//';
        $delimiter = ';';
        if (substr($string, 0, 2) == $prefix) {
            $delimiter = substr($string, 2, 1);
        }

        if (is_numeric($delimiter)) {
            throw new \Exception('Invalid delimiter: ' . $delimiter);
        }

        $string = preg_replace('/[^0-9\.]/', '~', $string);

        if (empty($string)) {
            return 0;
        }

        $parts = explode('~', $string);

        $numbers = array_filter($parts, function ($v) {
            return is_numeric(($v));
        });

        $total = array_sum($numbers);

        return $total;
    }

    public function add($string)
    {
        $t = 0;
        preg_match_all('/-?[0-9]+(\.[0-9]+)?([Ee]\d+)?/', $string, $matches);
        foreach ($matches[0] as $n) {
            $t += $n;
        }
        return $t;
    }
}