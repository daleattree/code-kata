<?php

class FizzBuzzKTest extends PHPUnit_Framework_TestCase
{
    /** @var  \Src\FizzBuzzK */
    protected $fizzBuzz;

    public function setUp()
    {
        $this->fizzBuzz = new \Src\FizzBuzzK();
    }

    public function testFizz(){
        //check if a multiple of 3 returns Fizz
        $answer = $this->fizzBuzz->result(3);
        $this->assertEquals('Fizz', $answer);
    }

    public function testBuzz(){
        //check if a multiple of 5 returns Buzz
        $answer = $this->fizzBuzz->result(5);
        $this->assertEquals('Buzz', $answer);
    }

    public function testFizzBuzz(){
        //check if a multiple of 3 and 5 returns FizzBuzz
        $answer = $this->fizzBuzz->result(15);
        $this->assertEquals('FizzBuzz', $answer);
    }

    public function testNumber(){
        //check if a multiple of 3 and 5 returns FizzBuzz
        $answer = $this->fizzBuzz->result(37);
        $this->assertEquals(37, $answer);
    }
}