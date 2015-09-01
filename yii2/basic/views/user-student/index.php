<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserStudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usr_id',
            'usr_name',
     //       'usr_pass',
            'usr_email:email',
      //      'usr_secq',
            // 'usr_seca',
            // 'usr_is_teacher',
            // 'usr_is_admin',
            // 'usr_is_su',
            // 'usr_type_id',
             [     		
        		'attribute'=>'usr_type_id',
        		'label'=>'Student',
        		'format'=>'text',
        		'value'=>'userStudent.st_fname',        		
        		],   		
        		'usr_active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
