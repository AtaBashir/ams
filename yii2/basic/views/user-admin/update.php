<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserAdmin */

$this->title = 'Update User Admin: ' . ' ' . $model->usr_id;
$this->params['breadcrumbs'][] = ['label' => 'User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usr_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
