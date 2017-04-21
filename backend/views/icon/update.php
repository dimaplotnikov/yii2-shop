<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Icons */

$this->title = 'Update Icons: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="icons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
