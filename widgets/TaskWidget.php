<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25/12/18
 * Time: 12:42
 */

namespace app\widgets;


use app\models\Tasks;
use yii\base\Widget;

class TaskWidget extends Widget
{

    public function run()
    {
        $model = Tasks::find()->select('id, title, description')->asArray()->all();
        //return $this->render('taskList', ['model' => $model]);
        return $this->render('taskList', ['model' => $model]);
    }
}