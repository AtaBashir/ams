<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Teacher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        	'tchr_disp_id',
            //'tchr_id',
            'tchr_fname',
            'tchr_lname',
           // 'tchr_address',
            //'tchr_postcode',
             'tchr_mobile',
            // 'tchr_phone',
             'tchr_email:email',
              'tchr_active:boolean',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
