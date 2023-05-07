<?php

use app\models\Fruit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FruitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fruits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fruit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'family',
            'order',
            [
                'header' => '',
                'format' => 'raw',
                'value' => function($model){
                    if($model->getFavourite()->count() == 0){
                        return Html::a('Make Favourite', ['add-favourite', 'id' => $model->id], [
                            'class' => 'btn btn-primary btn-xs',
                            'data' => [
                                'confirm' => 'Add to favourite?',
                                'method' => 'post',
                            ],
                        ]);
                    }else{
                        return Html::a('Remove as Favourite', ['remove-favourite', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-xs',
                            'data' => [
                                'confirm' => 'Remove favourite?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Fruit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
            ],
        ],
    ]); ?>

</div>
