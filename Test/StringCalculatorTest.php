<?php

use Src\StringCalculator;

class StringCalculatorTest extends PHPUnit_Framework_TestCase
{
    /** @var StringCalculator */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new StringCalculator();
    }

    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     */
    public function testCalculatorString($string, $expected){
        $result = $this->calculator->calculateString($string);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     */
    public function testCalculatorRegex($string, $expected){
        $result = $this->calculator->calculateRegex($string);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     */
    public function testAdd($string, $expected){
        $result = $this->calculator->add($string);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProvider
     * @param $string
     * @param $expected
     */
    public function testAddString($string, $expected){
        $result = $this->calculator->addString($string);
        $this->assertEquals($expected, $result);
    }

    public function dataProvider()
    {
        return array(
            array('', 0),
            array('1;2', 3),
            array('1;2;3;4', 10),
            array("//,\n1,2,3,4,5", 15)
        );
    }

}