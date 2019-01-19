<?php

namespace app\controllers;

use yii\web\UploadedFile;
use Yii;
use app\models\Task;
use app\models\Tasks;
use yii\web\Controller;
use app\models\filters\TasksSearch;
use app\models\Comments;

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

        $newComment = new Comments();
        $newComment->task_id = $id;

        $comments = $model->getComments()->all();
        $uploaded_file = UploadedFile::getInstance($newComment,'attachment');

        if ($newComment->load(Yii::$app->request->post()) && $newComment->save()) {


            //var_dump($newComment);exit;
                $newComment->attachment = $uploaded_file;
                $newComment->upload();

                if($newComment->attachment != null){
                    $newComment->attachment = $uploaded_file->name;
                    $newComment->update();
                }


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('view', [
            'model' => $model,
            'comments' => $comments,
            'newComment' => $newComment,
        ]);
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