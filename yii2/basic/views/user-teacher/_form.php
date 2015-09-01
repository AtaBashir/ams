<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Teacher;

/* @var $this yii\web\View */
/* @var $model app\models\UserTeacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-teacher-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php if ($model->isNewRecord) { ?>

    <?=$form->field($model, 'usr_type_id')->dropDownList(
		ArrayHelper::map(Teacher::find()->asArray()->all(), 'tchr_id', 'tchr_fname'), 
         ['prompt'=>'-Choose a Teacher-']) ?>
    <?php }?>
         
    <?= $form->field($model, 'usr_id')->textInput(['readonly'  => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'usr_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usr_pass')->passwordInput(['readonly'  => !$model->isNewRecord])?>

    <?= $form->field($model, 'usr_email')->input(['email']) ?>


    <?php //$form->field($model, 'usr_is_teacher')->checkbox() ?>

    <?php //$form->field($model, 'usr_is_admin')->checkbox() ?>

    <?php //$form->field($model, 'usr_is_su')->checkbox() ?>

    <?php // $form->field($model, 'usr_type_id')->textInput() ?>
    



    
    <?= $form->field($model, 'usr_active')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
