<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Icons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icons-index">

    <p>
        <?= Html::a('Create Icon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
