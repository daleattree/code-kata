<?php
use Src\BowlingGame;

class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    /** @var BowlingGame */
    private $bowlingGame;

    public function setUp()
    {
        $this->bowlingGame = new BowlingGame();
    }
    
    public function testGutterGame(){
        $frames = array();
        for($i = 0; $i < 10; $i+=1){
            $frames[] = array(0,0);
        }

        $result = $this->bowlingGame->calculateGame($frames);

        $message = 'Game score of ' . $result;

        $this->assertEquals(0, $result, $message);
    }

    public function test20PointGame(){
        $frames = array();
        for($i = 0; $i < 10; $i+=1){
            $frames[] = array(1,1);
        }

        $result = $this->bowlingGame->calculateGame($frames);

        $message = 'Game score of ' . $result;

        $this->assertEquals(20, $result, $message);
    }

    /**
     * 1 spare, 3 pins, 17 rolls of 0
     */
    public function test16PointGame(){
        $frames = array();
        $frames[] = array(0,10);
        $frames[] = array(3,0);
        for($i = 0; $i < 8; $i+=1){
            $frames[] = array(0,0);
        }

        $result = $this->bowlingGame->calculateGame($frames);

        $message = 'Game score of ' . $result;

        $this->assertEquals(16, $result, $message);
    }

    /**
     * 1 Strike, 3 pins, 4 pins, 16 rolls of 0
     */
    public function test24PointGame(){
        $frames = array();
        $frames[] = array(10);
        $frames[] = array(3,4);
        for($i = 0; $i < 8; $i+=1){
            $frames[] = array(0,0);
        }

        $result = $this->bowlingGame->calculateGame($frames);

        $message = 'Game score of ' . $result;

        $this->assertEquals(24, $result, $message);
    }

    /**
     * 10 strikes = 300
     */
    public function testPerfectGame(){
        $frames = array();
        for($i = 0; $i < 10; $i+=1){
            $frame = array(10);

            if($i == 9){
                $frame = array(10,10,10);
            }

            $frames[] = $frame;
        }

        $result = $this->bowlingGame->calculateGame($frames);

        $message = 'Game score of ' . $result;

        $this->assertEquals(300, $result, $message);
    }

}