<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Task extends Model
{
    public $id;
    public $title;
    public $status;
    public $category;
    public $description;
    public $manager;
    public $creation_date;
    public $due_date;
    public $attachment;

    public function rules()
    {
        return [
            [['id', 'title', 'status', 'category', 'description', 'manager', 'creation_date', 'due_date', 'attachment'], 'required'],
            ['title', 'myRule'],
        ];
    }

    public function myRule($attribute, $params)
    {
        if($this->$attribute == 'test' || strlen($this->$attribute) < 4){
            $this->addError($attribute, "Name cannot be *Test* or less than 4 symbols");
        }
    }

}