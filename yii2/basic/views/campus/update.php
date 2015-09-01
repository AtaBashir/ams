<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\campus */

$this->title = 'Update Campus: ' . ' ' . $model->cmps_id;
$this->params['breadcrumbs'][] = ['label' => 'Campuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cmps_id, 'url' => ['view', 'id' => $model->cmps_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="campus-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
