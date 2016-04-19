<?php
/**
 * Created by PhpStorm.
 * User: dale
 * Date: 2016/04/15
 * Time: 10:24 AM
 */

namespace Src;


class BowlingGame
{

    protected $score = array();

    public function calculateGame($frames){
        $strike = false;
        $spare = false;

        $gameTotal = 0;

        foreach($frames as $k => $frame){
            $rollTotal = array_sum($frame);
            $rollCount = count($frame);
            $roll1 = $frame[0];
            $roll2 = 0;
            if($rollCount >= 2){
                $roll2 = $frame[1];
            }
            $roll3 = 0;
            if($rollCount == 3){
                $roll3 = $frame[2];
            }

            if($strike){
                if($k != 9) {
                    $nextFrame = $frames[$k];
                    $gameTotal += array_sum($nextFrame);

                    if (count($nextFrame) == 1) {
                        $followingFrame = $frames[$k + 1];
                        $gameTotal += $followingFrame[0];
                    }
                }

                //tenth frame
                if($k == 9){
                    if($roll1 == 10){
                        $gameTotal += $roll2;
                        $gameTotal += $roll3;

                        if($roll2 == 10){
                            $gameTotal += $roll3;
                        }
                    }
                }

            }

            if($spare){
                $nextFrame = $frames[$k];
                $gameTotal += $nextFrame[0];
            }

            $gameTotal += $roll1;
            $gameTotal += $roll2;

            if($rollCount == 1 && $rollTotal == 10){
                //strike
                $strike = true;
                $spare = false;
            }

            if($rollCount == 2 && $rollTotal == 10){
                //spare
                $strike = false;
                $spare = true;
            }
        }

        return $gameTotal;
    }

}