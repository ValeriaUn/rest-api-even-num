<?php

namespace app\controllers;

use app\dto\ListDto;
use app\requests\EvenNumbersAdditionRequest;
use app\services\EvenNumbersService;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;

class ApiController extends Controller
{
    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    /**
     * @param EvenNumbersAdditionRequest $request
     * @return array
     * @throws BadRequestHttpException
     */
    public function actionMultiply(): array
    {
        $data = Yii::$app->request->get();
//        dd($data);
        $requestedList = new EvenNumbersAdditionRequest();
        $requestedList->load($data, '');

        if (!$requestedList->validate()) {
            Yii::$app->response->statusCode = 422;

            return ['errors' => $requestedList->errors];
        }


        $dto = new ListDto($requestedList);
        $service = new EvenNumbersService();
        $result = $service->addition($dto->list);

        return ['result' => $result];
    }
}
