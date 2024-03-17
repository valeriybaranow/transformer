<?php

declare(strict_types=1);

namespace App;

class TransformerService
{
    const DAYS_OF_WEEK = array('пн','вт', 'ср', 'чт', 'пт', 'сб', 'вс');

    public function dateTime(string $string): array
    {
        preg_match('/([пн|вт|ср|чт|пт|сб|вс]+)(-([пн|вт|ср|чт|пт|сб|вс]+))* с ([0-9]{2}[:|.]{1}[0-9]{2}) до ([0-9]{2}[:|.]{1}[0-9]{2})(, перерыв с ([0-9]{2}[:|.]{1}[0-9]{2}) до ([0-9]{2}[:|.]{1}[0-9]{2}))*/i', $string, $result);

        $wt = [];
        $ww = [];
        $isStartPeriod = false;
        foreach (self::DAYS_OF_WEEK as $dayOfWeek) {
            if($result[1] == $dayOfWeek) {
                $wt = $this->addWt($result, $wt, $dayOfWeek);
                if(isset($result[6])) {
                    $ww = $this->addWw($result, $ww, $dayOfWeek);
                }
                if($result[3]) {
                    $isStartPeriod = true;
                }
            }
            if($isStartPeriod) {
                $wt = $this->addWt($result, $wt, $dayOfWeek);
                if(isset($result[6])) {
                    $ww = $this->addWw($result, $ww, $dayOfWeek);
                }
                if($result[3] == $dayOfWeek) {
                    $isStartPeriod = false;
                }
            }
        }
        return [$wt,$ww];
    }

    private function addWt(array $result, array $wt, string $dayOfWeek): array
    {
        $wt[$dayOfWeek] = array(
            "begin" => $result[4],
            "end" => $result[5]
        );
        return $wt;
    }

    public function addWw(array $result, array $ww, string $dayOfWeek): array
    {
        $ww[$dayOfWeek] = array(
            "begin" => $result[7],
            "end" => $result[8]
        );
        return $ww;
    }
}

