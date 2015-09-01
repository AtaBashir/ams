<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'st_id')->textInput() ?>
    <?= $form->field($model, 'st_disp_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'st_email')->input('email') ?>

    <?= $form->field($model, 'st_active')->checkbox() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
