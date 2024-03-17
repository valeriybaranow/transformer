<?php

declare(strict_types=1);

use App\TransformerService;

require_once __DIR__ . '/../vendor/autoload.php';

$transformerService = new TransformerService();

$result = $transformerService->dateTime('пн-вт с 10:20 до 20:00, перерыв с 12:00 до 13:00');
list($dt, $dw) = $result;
print_r($dt);
print_r($dw);

$result = $transformerService->dateTime('пн с 10:20 до 20:00, перерыв с 12:00 до 13:00');
list($dt, $dw) = $result;
print_r($dt);
print_r($dw);

$result = $transformerService->dateTime('пн с 10:20 до 20:00');
list($dt, $dw) = $result;
print_r($dt);
print_r($dw);