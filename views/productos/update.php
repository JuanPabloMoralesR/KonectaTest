<?php 


$this->title = 'Actualizar producto';
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;




?>

<div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h2>Actualizar Producto </h2>
        </div>
    </div>

    <div class="col-md-12">
    <?php  $form = ActiveForm::begin(['action' => "index.php?r=productos/update&id=$id",'options' => ['method' => 'post']]) ;?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($productoModel, 'nombre')->textInput()?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($productoModel, 'referencia')->textInput()?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($productoModel, 'categoria')->textInput()?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($productoModel, 'precio')->textInput()?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($productoModel, 'peso')->textInput()?>
                </div>
            </div>
            <?= Html::submitButton('Actualizar producto', ['class' => 'btn btn-primary']) ?>
        <?php  ActiveForm::end(); ?>

    </div>
</div>



