<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserStudent */

$this->title = 'Create User Student';
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
