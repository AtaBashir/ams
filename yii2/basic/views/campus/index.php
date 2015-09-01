<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Campus', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cmps_id',
            'cmps_desc',
            'cmps_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
