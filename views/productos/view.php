<?php 


$this->title = 'Productos';
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
            <h2>Inventario de productos <small>Ver, eliminar, actualizar producto</small></h2>
            <?php 
                Modal::begin([
                    'header' => '<h2>Formulario de creación del producto</h2>',
                    'toggleButton' => ['label' => 'Crear Producto', 'class' => 'btn btn-success'],
                ]);
                    $form = ActiveForm::begin(['action' => ['productos/create'],'options' => ['method' => 'post']]) ;
                ?>
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
                        <div class="col-md-6">
                            <?= $form->field($productoModel, 'peso')->textInput()?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($productoModel, 'stock')->textInput()?>
                        </div>
                    </div>
                    <?= Html::submitButton('Crear producto', ['class' => 'btn btn-primary']) ?>
                <?php 
                    ActiveForm::end();
                    Modal::end();
                ?>
        </div>
    </div>

    <div class="col-md-12">
    
        <div class="alert alert-info" rol="alert">
            <?= Yii::$app->session->getFlash('msg') ?? 'Aquí se mostrarán los mensajes cuando ejecutes alguna acción.'?>
        </div>
        <?=
            GridView::widget([
                'dataProvider' => new ActiveDataProvider(['query' => $listaProductos, 'pagination' => ['pageSize' => 20]]),
                'columns' => [
                    'id',
                    'nombre', 
                    'referencia', 
                    'precio', 
                    'peso', 
                    'categoria', 
                    'stock', 
                    'fecha_creacion', 
                    'fecha_ultima_venta', 
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Acciones',
                        'template'=>'{delete} {sell} {update}',      
                        'buttons'=>[
                            'delete'=>function ($url, $model) {
                                $ruta = 'index.php?r=productos/delete&id='.$model['id'];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span> Eliminar', $ruta, ['class' => 'btn btn-xs btn-danger']);
                            },
                            'sell' => function($url, $model){
                                $ruta = 'index.php?r=productos/sell&id='.$model['id'];
                                return Html::a('<span class="glyphicon glyphicon-euro"></span> Vender', $ruta, ['class' => 'btn btn-xs btn-success']);
                            }, 
                            'update' => function($url, $model){
                                $ruta = 'index.php?r=productos/update&id='.$model['id'];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span> Actializar', $ruta, ['class' => 'btn btn-xs btn-info']);
                            }, 
                        ],
                    ], 
                   
                ], 
            ]);
        
        ?>
    
    </div>
</div>



