<?php

namespace app\tests\unit\services;

use app\services\EvenNumbersService;
use Codeception\Test\Unit;

class AdditionServiceTest extends Unit
{
    public function testAdditionEvenNumbers()
    {
        $service = new EvenNumbersService();

        // Only even numbers
        $this->assertEquals(20, $service->addition([2, 4, 6, 8]));

        // No even numbers
        $this->assertEquals(0, $service->addition([1, 3, 5]));

        // Mixed numbers
        $this->assertEquals(6, $service->addition([1, 2, 3, 4]));

        // Empty array
        $this->assertEquals(0, $service->addition([]));
    }
}