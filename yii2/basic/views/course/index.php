<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'crs_disp_id',
            'crs_desc',
            
        		[
        		'attribute'=>'crs_ct_id',		
        		'label'=>'Course Type',
        		'format'=>'text',
        		'value'=>'crsCt.ct_desc',
        		],
            'crs_duration',
           // 'crs_drtn_type',
        		[
        		'attribute'=>'crs_drtn_type',
        		'label'=>'Duration Type',
        		'format'=>'text',
        		'value' => function ($data){
 return $data->crs_drtn_type==1 ? "Days": "Week";
}
        		],
            // 'crs_days',
            // 'crs_wkly_hrs',
            // 'crs_active',
            // 'crs_disp_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
