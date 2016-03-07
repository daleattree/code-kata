<?php
use Src\FizzBuzz;

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /** @var FizzBuzz */
    private $fizzBuzz;

    public function setUp()
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    /**
     * @dataProvider dataProvider
     * @param integer $v
     * @param $expected
     */
    public function testFizzBuzz($v, $expected){
        $result = $this->fizzBuzz->getAnswer($v);
        $this->assertEquals($expected, $result);
    }

    public function dataProvider()
    {
        return array(
            array(3, 'Fizz'),
            array(13, 'Fizz'),
            array(5, 'Buzz'),
            array(52, 'Buzz'),
            array(15, 'FizzBuzz'),
            array(2, 2),
        );
    }

}