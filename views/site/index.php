<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Inicio';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Prueba ténica para Konecta: Juan Pablo Morales Rincón </h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
        <p><?= Html::a('Empezar, ver productos',[Url::to('productos/view')], ['class' => 'btn btn-lg btn-info'])?></p>
    </div>
</div>
