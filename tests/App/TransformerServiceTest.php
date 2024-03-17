<?php

namespace App;

use PHPUnit\Framework\TestCase;

class TransformerServiceTest extends TestCase
{
    public function testDateTime()
    {
        $transformerService = new TransformerService();
        $result = $transformerService->dateTime('пн-вт с 10.20 до 20.00, перерыв с 12:00 до 13.00');
        list($dt, $dw) = $result;
        $this->assertEquals(
            array(
                "пн" => array(
                    "begin" => "10.20",
                    "end" => "20.00"
                ),
                "вт" => array(
                    "begin" => "10.20",
                    "end" => "20.00"
                ),
            ),
            $dt
        );
        $this->assertEquals(
            array(
                "пн" => array(
                    "begin" => "12:00",
                    "end" => "13.00"
                ),
                "вт" => array(
                    "begin" => "12:00",
                    "end" => "13.00"
                ),
            ),
            $dw
        );

        $result = $transformerService->dateTime('вт с 10.20 до 20.00, перерыв с 12:00 до 13.00');
        list($dt, $dw) = $result;
        $this->assertEquals(
            array(
                "вт" => array(
                    "begin" => "10.20",
                    "end" => "20.00"
                ),
            ),
            $dt
        );
        $this->assertEquals(
            array(
                "вт" => array(
                    "begin" => "12:00",
                    "end" => "13.00"
                ),
            ),
            $dw
        );

        $result = $transformerService->dateTime('вт с 10.20 до 20.00');

        list($dt, $dw) = $result;
        $this->assertEquals(
            array(
                "вт" => array(
                    "begin" => "10.20",
                    "end" => "20.00"
                ),
            ),
            $dt
        );
        $this->assertEquals(
            array(),
            $dw
        );
    }
}
