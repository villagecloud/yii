<?php

namespace app\components\controllerEvents;

use app\models\Tasks;
use Yii;
use app\models\Task;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class TaskEvent extends Component implements BootstrapInterface
{

    public function bootstrap($app){
        $this->attachEvents();
}

    protected function attachEvents(){

        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function($event){

            $task = $event->sender;
            $user = $task->manager_id;

            //TODO: Добавить поле email в таблицу Users в БД

            Yii::$app->mailer->compose()
            ->setTo('2@2test.com')
            ->setSubject($task->title)
            ->setTextBody($task->description)
            ->send();
        });
    }

}
