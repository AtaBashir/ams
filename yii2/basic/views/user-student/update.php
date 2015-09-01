<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserStudent */

$this->title = 'Update User Student: ' . ' ' . $model->usr_id;
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usr_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
