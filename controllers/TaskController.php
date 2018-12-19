<?php

namespace app\controllers;
use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        //echo "Task page!";exit;


        $model = new Task();

        $model->load([
            'Task' =>
                [
                    'id' => 13,
                    'title' => 'test',
                    'status' => 'completed',
                    'manager' => 'Not Geek',
                ]
        ]
        );

        var_dump($model);
        var_dump($model->validate());
        //echo $model->getAttributeLabel('title');
        var_dump($model->getErrors());exit;

        return $this->render('index');
    }
}