<?php

namespace app\dto;

use app\requests\EvenNumbersAdditionRequest;

class ListDto
{
    public $list;

    public function __construct(EvenNumbersAdditionRequest $requestedList)
    {
        $this->list = $requestedList->numbers;
    }
}