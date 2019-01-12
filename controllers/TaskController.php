<?php

namespace app\controllers;
use app\models\Task;
use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find(),
            'pagination' => [
                'pageSize' => 5,
            ],

        ]);

        //var_dump($dataProvider);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = Tasks::findOne($id);
        return $this->render('view', ['model' => $model]);
    }

}