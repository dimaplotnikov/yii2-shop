<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?= Html::a('Create product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => function($data)
                {
                    return $data->category->name;
                }
            ],
            'name',
            'price',
            [
                'attribute' => 'hit',
                'value' => function($data)
                {
                    return !$data->hit ? '<span class="text-danger">No</span>' :
                        '<span class="text-success">Yes</span>';
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'new',
                'value' => function($data)
                {
                    return !$data->new ? '<span class="text-danger">No</span>' :
                        '<span class="text-success">Yes</span>';
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'sale',
                'value' => function($data)
                {
                    return !$data->sale ? '<span class="text-danger">No</span>' :
                        '<span class="text-success">Yes</span>';
                },
                'format' => 'html'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>