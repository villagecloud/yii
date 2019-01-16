<?php

namespace app\controllers;

use app\models\Tasks;
use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class UsersController extends Controller
{
    public function actionIndex()
    {
        //$userTasks = null;

        if(Yii::$app->user->isGuest){
            Yii::$app->response->redirect(['site/login'],302);
        }


        //Добавлен cache при получении данных из БД

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->cache(100)->where(['manager_id' => Yii::$app->user->id])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider ,
        ]);
    }
}