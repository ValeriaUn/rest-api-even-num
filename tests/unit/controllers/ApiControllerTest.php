<?php

namespace app\tests\unit\controllers;

use app\controllers\ApiController;
use Codeception\Test\Unit;
use PHPUnit\Framework\MockObject\Exception;
use Yii;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;
use yii\web\Request;

class ApiControllerTest extends Unit
{
    /**
     * @return void
     * @throws Exception
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function testSubtractEvenNumbersAction()
    {
        $requestMock = $this->createMock(Request::class);
        $requestMock->method('get')->willReturn(['numbers' => [2, 8]]);
        Yii::$app->set('request', $requestMock);

        $controller = new ApiController('numbers', Yii::$app);

        $response = $controller->actionMultiply();
        $this->assertEquals(['result' => 10], $response);
    }
}