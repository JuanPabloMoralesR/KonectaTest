<?php 


$this->title = 'Productos';
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
?>

<div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h2>Crud de productos <small>Ver, eliminar, actualizar producto</small></h2>
        </div>
    </div>
</div>



<?php 
Modal::begin([
    'header' => '<h2>Formulario de creación del producto</h2>',
    'toggleButton' => ['label' => 'Crear Producto', 'class' => 'btn btn-success'],
]);
    $form = ActiveForm::begin(['action' => ['productos/create'],'options' => ['method' => 'post']]) ;
?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($productos, 'nombre')->textInput()?>
        </div>
        <div class="col-md-6">
            <?= $form->field($productos, 'referencia')->textInput()?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($productos, 'categoria')->textInput()?>
        </div>
        <div class="col-md-6">
            <?= $form->field($productos, 'precio')->textInput()?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($productos, 'peso')->textInput()?>
        </div>
        <div class="col-md-6">
            <?= $form->field($productos, 'stock')->textInput()?>
        </div>
    </div>
    <?= Html::submitButton('Crear producto', ['class' => 'btn btn-primary']) ?>
<?php 
    ActiveForm::end();
    Modal::end();
?>