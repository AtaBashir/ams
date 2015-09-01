<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ct_id',
            'ct_desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
