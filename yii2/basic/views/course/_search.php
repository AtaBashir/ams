<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'crs_id') ?>

    <?= $form->field($model, 'crs_desc') ?>

    <?= $form->field($model, 'crs_ct_id') ?>

    <?= $form->field($model, 'crs_duration') ?>

    <?= $form->field($model, 'crs_drtn_type') ?>

    <?php // echo $form->field($model, 'crs_days') ?>

    <?php // echo $form->field($model, 'crs_wkly_hrs') ?>

    <?php // echo $form->field($model, 'crs_active') ?>

    <?php // echo $form->field($model, 'crs_disp_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
