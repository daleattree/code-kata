<?php


use Src\RomanNumerals;

class RomanNumeralsTest extends PHPUnit_Framework_TestCase
{

    /** @var RomanNumerals */
    private $romanNumerals;

    public function setUp()
    {
        $this->romanNumerals = new RomanNumerals();
    }

    /**
     * @dataProvider dataProvider
     * @param integer $v
     * @param $expected
     */
    public function testTranslator($v, $expected){
        $result = $this->romanNumerals->reduce($v);
        $this->assertEquals(strtoupper($expected), $result);
    }

    public function dataProvider()
    {
        return array(
            array(1, 'i'),
            array(2, 'ii'),
            array(4, 'iv'),
            array(5, 'v'),
            array(6, 'vi'),
            array(9, 'ix'),
            array(10, 'x'),
            array(11, 'xi'),
            array(20, 'xx'),
            array(40, 'xl'),
            array(50, 'l'),
            array(100, 'c'),
            array(500, 'd'),
            array(1000, 'm'),
            array(1999, 'mcmxcix'),
            array(4990, 'mmmmcmxc'),
        );
    }
}