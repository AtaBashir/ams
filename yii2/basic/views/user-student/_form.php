<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Student;

/* @var $this yii\web\View */
/* @var $model app\models\UserStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'usr_id')->textInput(['readonly'  => !$model->isNewRecord]) ?>
       
     
	<?php if ($model->isNewRecord) { ?>
   
    <?php //} ?> 
     <?=$form->field($model, 'usr_type_id')->dropDownList(
		ArrayHelper::map(Student::find()->asArray()->all(), 'st_id', 'st_fname'), 
         ['prompt'=>'-Choose a Student-',
         		'onchange'=>'
          		$.post( "index.php?r=student/list&id='.'"+$(this).val(), function( data ) {
         		$( "#userstudent-usr_id").val(data);
                            });'    
                ]); ?>
     <?php }?>
             		           
     <?=  $form->field($model, 'usr_id')->textInput(['readonly' => true]) ?>
    <?= $form->field($model, 'usr_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usr_pass')->passwordInput(['readonly'  => !$model->isNewRecord])?>

    <?= $form->field($model, 'usr_email')->input('email') ?>


    <?php // $form->field($model, 'usr_is_teacher')->textInput() ?>

    <?php // $form->field($model, 'usr_is_admin')->textInput() ?>

    <?php // $form->field($model, 'usr_is_su')->textInput() ?>

    <?php // $form->field($model, 'usr_type_id')->textInput() ?>
    
 

    <?= $form->field($model, 'usr_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
