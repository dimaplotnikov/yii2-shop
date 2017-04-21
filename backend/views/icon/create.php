<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Icons */

$this->title = 'Create Icons';
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
