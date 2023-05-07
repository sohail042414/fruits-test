<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Nutrition $model */

$this->title = 'Update Nutrition: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nutritions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nutrition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
