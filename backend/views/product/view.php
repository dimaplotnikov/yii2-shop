<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage();
    $gallery = $model->getImages();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //
            [
                'attribute' => 'parent_id',
                'value' => $model->category->name
            ],
            'name',
            'content:html',
            'price',
            'slug',
            'description',
            'made_in',
            'color',
            [
                'attribute' => 'hit',
                'value' => !$model->hit ? '<span class="text-danger">No</span>' :
                    '<span class="text-success">Yes</span>',
                'format' => 'html'
            ],
            [
                'attribute' => 'new',
                'value' => !$model->new ? '<span class="text-danger">No</span>' :
                    '<span class="text-success">Yes</span>',
                'format' => 'html'
            ],
            [
                'attribute' => 'sale',
                'value' => !$model->sale ? '<span class="text-danger">No</span>' :
                    '<span class="text-success">Yes</span>',
                'format' => 'html'
            ],
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl()}'>",
                'format' => 'html'
            ],
        ],
    ]) ?>
    <?php
    $img_str='';
    echo ' <div class="row">';
    foreach($gallery as $img_g){
        $url_delete= \yii\helpers\Url::toRoute(['product/deleteimg', 'id_reshenie' => $model->id, 'id_img' => $img_g->id]); //настройка роутера на нужный урл
        $img_str.='
		<div class="col-xs-6 col-md-3">
		<div  class="thumbnail reshenie_image_form">
			 <a class="btn delete_reshenie_img" title="Удалить?" href="'.$url_delete.'" data-id="'.$img_g->id.'"><span class="glyphicon glyphicon-remove"></span></a>
		  <a class="fancybox img-rounded" rel="gallery1" href="'. $img_g->getUrl().'">'.Html::img($img_g->getUrl(), ['alt' => '']).'</a>
		</div>
		</div> ';
    }
    echo $img_str;
    echo '</div>';
    ?>

</div>
