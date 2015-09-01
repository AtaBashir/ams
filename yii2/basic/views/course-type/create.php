<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CourseType */

$this->title = 'Create Course Type';
$this->params['breadcrumbs'][] = ['label' => 'Course Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
