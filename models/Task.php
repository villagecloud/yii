<?php

namespace app\models;

use app\components\controllerEvents\TaskEvent;
use app\components\validators\CustomValidator;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class Task
 * @property string $title
 * @property string $status
 */
class Task extends ActiveRecord
{

    public static function tableName()
    {
        return 'task';
    }

    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            ['title', 'myRule'],
            ['manager', CustomValidator::class],
        ];
    }

    public function myRule($attribute, $params)
    {
        if($this->$attribute == 'test' || strlen($this->$attribute) < 4){
            $this->addError($attribute, "Name cannot be *Test* or less than 4 symbols");
        }
    }

}