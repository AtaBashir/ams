<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CourseType;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'crs_id')->textInput() ?>
  	
  	<?php if ($model->isNewRecord) { ?>
  	
         <?=$form->field($model, 'crs_ct_id')->dropDownList(
		ArrayHelper::map(CourseType::find()->asArray()->all(), 'ct_id', 'ct_desc'), 
         ['prompt'=>'-Choose a Course Type-']); ?>   
 
    <?php } else {  ?>
    
           <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['label'=>'Course Type',
            'format'=>'text',
            'value'=>$model->crsCt->ct_desc,
   			 ],
           
        ],
    ]) ?>
    
    
    <?php }?>
    <?= $form->field($model, 'crs_disp_id')->textInput(['readonly'  => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'crs_desc')->textInput(['maxlength' => true]) ?>

        
 

    <?= $form->field($model, 'crs_duration')->textInput() ?>

    <?= $form->field($model, 'crs_drtn_type')->dropDownList(['1' => 'Days' , '2' => 'Week']); ?>

    <?php // $form->field($model, 'crs_days')->textInput() ?>
    
    <?= $form->field($model, 'crs_wkly_hrs')->textInput() ?>

    <?= $form->field($model, 'crs_active')->checkbox() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
