<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var app\models\Fruit $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fruits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fruit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'family',
            'order',
            'genus',
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

    <h1>Nutritions</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'value'
        ],
    ]); ?>

</div>
