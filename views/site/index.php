<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';

\app\assets\MainAsset::register($this);
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Task tracker</h1>
        <p class="lead">This is board of tasks for your organisation.</p>
    </div>


    <div id="my-container" class="body-content">
        <div class="row">
            <?/* //echo  \app\widgets\TaskWidget::widget(); */?>
            <button id="my_button" class="btn btn-success">Rock'n'roll</button>
        </div>

    </div>
</div>
