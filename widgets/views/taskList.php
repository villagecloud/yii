<?php
use yii\helpers\Html;
use app\widgets\TaskWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

?>
<?php //foreach ($model as $key => $val):?>
<!--    <?/*= $val['id']*/?>
    <?/*= $val['title']*/?>
    --><?/*= $val['description']*/?>
    <div class="col-sm-3 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3><?= $model->title?></h3>
                <p><?= $model->description?></p>
                <p><?=Html::a('View', ['task/view', 'id' => $model->id], ['class' => 'btn btn-primary'])?></p>
                <p><?=Html::a('Update', ['task/update', 'id' => $model->id], ['class' => 'btn btn-primary'])?></p>
                <p></p>

<!--                <h3><?/*= $model->username*/?></h3>
                <p><?/*= $val['description']*/?></p>
                <p><?/*=Html::a('View', ['tasks/view', 'id' => $val['id']], ['class' => 'btn btn-primary'])*/?></p>
                <p><?/*=Html::a('Update', ['tasks/update', 'id' => $val['id']], ['class' => 'btn btn-primary'])*/?></p>
                <p></p>
-->


            </div>
        </div>
    </div>
<?php //endforeach;?>

<?php
//Html::a('Update', ['update', 'id' => $val['id']], ['class' => 'btn btn-primary'])
//TODO: настроить правильный вывод
?>

