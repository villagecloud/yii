<?php


/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $dataProvider \yii\data\ActiveDataProvider*/
//var_dump($dataProvider->getModels());exit;
?>

<?php
       //Кэширование HTML кода


/*        $key = 'key_user_tasks' . \Yii::$app->user->id;

        if($this->beginCache($key,[
            'duration' => 200,
            'enabled' => true,
        ])){
            echo \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => function($model){
                    return \app\widgets\TaskWidget::widget(['model' => $model]);
                },
                'summary' => false,
            ]);

            $this->endCache();

        }*/

        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function($model){
                //var_dump($model);
                return \app\widgets\TaskWidget::widget(['model' => $model]);
            },
            'summary' => false,
        ]);
?>