<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\filters\TasksSearch;

class TaskController extends Controller
{
    public function actionIndex()
    {

/*        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find(),
            'pagination' => [
                'pageSize' => 5,
            ],

        ]);*/

        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        //var_dump($dataProvider);
        //return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = Tasks::findOne($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }

}