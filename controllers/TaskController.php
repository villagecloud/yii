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
                ]
        ]
        );

        var_dump($model);
        var_dump($model->validate());
        var_dump($model->getErrors());exit;

        return $this->render('index');
    }
}