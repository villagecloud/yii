<?php

namespace app\controllers;
use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $model = new Task();

        $model->load([
            'Task' =>
                [
                    'title' => 'task',
                    'status' => 'completed',
                    'manager' => 'Geek',
                ]
        ]
        );

        $model->save();
        var_dump($model);
        //var_dump($model->validate());
        //echo $model->getAttributeLabel('title');
        var_dump($model->getErrors());exit;

        return $this->render('index');
    }
}