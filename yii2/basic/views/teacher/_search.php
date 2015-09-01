<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'tchr_id') ?>
    
    <?= $form->field($model, 'tchr_disp_id') ?>
    
    <?= $form->field($model, 'tchr_fname') ?>

    <?= $form->field($model, 'tchr_lname') ?>

    <?= $form->field($model, 'tchr_address') ?>

    <?= $form->field($model, 'tchr_postcode') ?>

    <?= $form->field($model, 'tchr_mobile') ?>

    <?= $form->field($model, 'tchr_phone') ?>

    <? $form->field($model, 'tchr_email') ?>

    <?php // echo $form->field($model, 'tchr_active') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
