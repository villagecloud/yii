<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Task tracker</h1>
        <p class="lead">This is a tasks board of your organisation.</p>
    </div>


    <div class="body-content">
        <div class="row">
            <?= \app\widgets\TaskWidget::widget(); ?>
        </div>
    </div>
</div>
