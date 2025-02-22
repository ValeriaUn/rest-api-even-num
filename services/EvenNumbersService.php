<?php

namespace app\services;

use app\interfaces\EvenNumbersInterface;

class EvenNumbersService implements EvenNumbersInterface
{

    public function addition(array $list): int
    {
        $even = array_filter($list, function ($number) {
            return $number % 2 === 0;
        });

        if (empty($even)) {
            return 0;
        }

        $result = array_shift($even);

        foreach ($even as $number) {
            $result += $number;
        }

        return $result;
    }
}