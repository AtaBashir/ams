<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CourseType;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->crs_id;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->crs_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->crs_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'crs_id',
        	'crs_disp_id',
            'crs_desc',
            //'crs_ct_id',
            ['label'=>'Course Type',
            'format'=>'text',
            'value'=>$model->crsCt->ct_desc,
   			 ],
            'crs_duration',
        //    'crs_drtn_type',
        		[
        		'attribute'=>'crs_drtn_type',
        		'label'=>'Duration Type',
        		'format'=>'text',
        		'value' => $model->crs_drtn_type==1 ? "Days": "Week",
        		
        		],
            'crs_days',
            'crs_wkly_hrs',
            'crs_active:boolean',
            
        ],
    ]) ?>

</div>
