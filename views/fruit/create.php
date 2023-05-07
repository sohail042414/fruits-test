<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fruit $model */

$this->title = 'Create Fruit';
$this->params['breadcrumbs'][] = ['label' => 'Fruits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
