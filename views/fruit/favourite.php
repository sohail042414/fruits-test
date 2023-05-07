<?php

use app\models\Fruit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FruitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Favourite Fruits';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fruit.name',
            'fruit.family',
            'fruit.order',
            [
                'header' => '',
                'format' => 'raw',
                'value' => function($model){
                        
                        return Html::a('Remove as Favourite', ['remove-favourite', 'id' => $model->fruit_id], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'data' => [
                                        'confirm' => 'Remove favourite?',
                                        'method' => 'post',
                                ],
                        ]);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->fruit_id]);
                 },
            ],
        ],
    ]); ?>

</div>
