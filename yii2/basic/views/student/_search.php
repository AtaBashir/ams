<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'st_id') ?>

    <?php $form->field($model, 'st_disp_id') ?>
        
    <?= $form->field($model, 'st_fname') ?>

    <?= $form->field($model, 'st_lname') ?>

    <?= $form->field($model, 'st_address') ?>

    <?= $form->field($model, 'st_postcode') ?>

    <?= $form->field($model, 'st_mobile') ?>

    <?= $form->field($model, 'st_phone') ?>

    <?= $form->field($model, 'st_email') ?>

    <?php // echo $form->field($model, 'st_active') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
