<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Teacher;
use app\models\UserTeacher;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Teacher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usr_id',
            'usr_name',
         //   'usr_pass',
            'usr_email:email',
          //  'usr_secq',
            // 'usr_seca',
            // 'usr_is_teacher',
            // 'usr_is_admin',
            // 'usr_is_su',
//             'usr_type_id',
				
        		[
        		'attribute'=>'usr_type_id',
        		'label'=>'Teacher',
        		'format'=>'text',
        		'value'=>'userTeacher.tchr_fname',        		
        		],   		
        		'usr_active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
