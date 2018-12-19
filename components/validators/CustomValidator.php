<?php

namespace app\components\validators;


use yii\validators\Validator;

class CustomValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if ($model->$attribute != 'Geek') {
            $this->addError($model, $attribute, 'Could be only *Geek*');
        }
    }
}