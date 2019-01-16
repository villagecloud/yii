<?php

/* @var $this yii\web\View */
/* @var $model app\models\Users */
//var_dump($dataProvider->getModels());exit;
?>

<?php  echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider ,
    'itemView' => function($model){
        //var_dump($model);
        return \app\widgets\TaskWidget::widget(['model' => $model]);
    },
    'summary' => false,
]);
?>