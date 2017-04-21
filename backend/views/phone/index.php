<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['action' => Url::to('/admin/phone/update')]) ?>
<?= $form->field($model, 'number') ?>
<?= Html::submitButton('Save',['class' => 'btn btn-success'])?>
<?php ActiveForm::end() ?>
