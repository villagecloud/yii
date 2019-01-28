<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28/01/19
 * Time: 17:31
 */

namespace app\commands;

use yii;
use app\models\Tasks;
use yii\console\Controller;

class TaskController extends Controller
{

    public function actionIndex()
    {
        $tasks = Tasks::find()
            ->where('due_date - CURRENT_DATE = 1')
            //->where('datediff(now(), due_date) <= 1')
            ->with('manager')
            ->all();
        //var_dump($tasks); exit;

        foreach ($tasks as $task){
            Yii::$app->mailer->compose()
                ->setTo($task->manager->email)
                ->setFrom('333333@2test.com')
                ->setSubject('Task date has been breached!!!!')
                ->setTextBody('Breached!!!!!')
                ->send();
        }

    }

}