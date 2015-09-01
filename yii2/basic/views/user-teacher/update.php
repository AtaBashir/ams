<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserTeacher */

$this->title = 'Update User Teacher: ' . ' ' . $model->usr_id;
$this->params['breadcrumbs'][] = ['label' => 'User Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usr_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-teacher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
