<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserStudent */

$this->title = $model->usr_id;
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'usr_id',
            'usr_name',
       //     'usr_pass',
            'usr_email:email',
             'usr_is_teacher:boolean',
            'usr_is_admin:boolean',
            'usr_is_su:boolean',
   //         'usr_type_id',
        	[
        		//'attribute'=>'usr_type_id',
        		'label'=>'Student',
        		'format'=>'text',
        		'value'=>$model->userStudent->st_fname,
        	],
            'usr_active:boolean',
        ],
    ]) ?>

</div>
