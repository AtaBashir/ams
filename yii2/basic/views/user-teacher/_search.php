<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserTeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usr_id') ?>

    <?= $form->field($model, 'usr_name') ?>

    <?= $form->field($model, 'usr_pass') ?>

    <?= $form->field($model, 'usr_email') ?>


    <?php // echo $form->field($model, 'usr_seca') ?>

    <?php // echo $form->field($model, 'usr_is_teacher') ?>

    <?php // echo $form->field($model, 'usr_is_admin') ?>

    <?php // echo $form->field($model, 'usr_is_su') ?>

    <?php // echo $form->field($model, 'usr_type_id') ?>

    <?php // echo $form->field($model, 'usr_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
