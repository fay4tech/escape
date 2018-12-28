<?php
/**
 * Copyright  Faycal.(c) 2018.
 */

namespace App\Traits;

/**
 * Trait CalculateNote
 * @package App\Traits
 */
trait CalculateNote
{
    /**
     * calculate the average mark
     * @param $note1
     * @param $note2
     * @param $note3
     * @return float|int
     */
    public function note($note1, $note2, $note3, $note4, $note5, $note6, $note7, $note8, $note9, $note10){
        if(config('app.locale') == 'fr'){
            $local = 5;
        }else{
            $local =1;
        }
        $globalNotes = ( $note1 + $note2 + $note3 + $note4 + $note5 + $note6 + $note7 + $note8 + $note9 + $note10) / $local ;
        return $globalNotes;
    }
}