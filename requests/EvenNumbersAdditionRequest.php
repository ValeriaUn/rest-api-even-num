<?php

namespace app\requests;

use yii\base\Model;
use yii\web\BadRequestHttpException;

class EvenNumbersAdditionRequest extends Model
{
    public $numbers;

    public function rules(): array
    {
        return [
            ['numbers', 'required'],
            ['numbers', 'each', 'rule' => ['integer']],
            ['numbers', 'validateArray'],
        ];
    }

    public function validateArray($attribute)
    {
        if (!is_array($this->$attribute)) {
            $this->addError($attribute, 'This must be an array.');
        }

        foreach ($this->$attribute as $number) {
            if (!is_numeric($number)) {
                $this->addError($attribute,'Only numbers allowed.');
            }
        }
    }
}