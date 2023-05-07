<?php

/** @var yii\web\View $this */

$this->title = 'Fruits Demo Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome to Fruits List!</h1>
        <p class="lead">Here you can see fruits with some details</p>
        <p><a class="btn btn-lg btn-success" href="<?= Yii::$app->urlManager->createUrl('fruit/index'); ?>">Browser Fruits</a></p>
    </div>
</div>
