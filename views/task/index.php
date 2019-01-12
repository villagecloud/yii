<?php //var_dump($dataProvider->getModels());?>

<?php  echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function($model){
            //var_dump($model);
            return \app\widgets\TaskWidget::widget(['model' => $model]);
        },
        'summary' => false,
]);
?> 