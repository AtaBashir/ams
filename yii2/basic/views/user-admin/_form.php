<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserAdmin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-admin-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'usr_id')->textInput(['readonly'  => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'usr_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usr_pass')->passwordInput(['readonly'  => !$model->isNewRecord])?>

    <?= $form->field($model, 'usr_email')->input(['email']) ?>

    <?php //$form->field($model, 'usr_is_teacher')->checkbox() ?>

    <?php //$form->field($model, 'usr_is_admin')->checkbox() ?>

    <?php $form->field($model, 'usr_is_su')->checkbox() ?>

    <?php // $form->field($model, 'usr_type_id')->textInput() ?>

    <?= $form->field($model, 'usr_active')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
