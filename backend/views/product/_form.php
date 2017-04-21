<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Category::find()->where(['not', ['parent_id' => null]])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [/* Some CKEditor Options */])
    ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'hit')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'new')->checkbox(['0', '1',]) ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1',]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
