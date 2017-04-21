<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            //'parent_id',
            [
                'attribute' => 'parent_id',
                'value' => function($data)
                {
                    return $data->category->name ? $data->category->name :
                        'Самостоятельная категория';
                },
            ],
            'name',
            'slug',
            'keywords:ntext',
            // 'desciption:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
