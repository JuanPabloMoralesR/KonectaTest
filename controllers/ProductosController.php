<?php 

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\CrearProductoForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\db\Query;



class ProductosController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view', 'create', 'delete', 'sell'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionView()
    {

        $productoModel = new CrearProductoForm();
        $listaProductos = Producto::find();
    
        return $this->render('view', ['productoModel' => $productoModel, 'listaProductos' => $listaProductos]);
    }

    public function actionCreate(){ 
        $request = Yii::$app->request;
        $producto = new Producto();
        $db = Yii::$app->db;
        $producto->attributes = $request->post('Productos');
        if($request->isPost && $producto->validate()){ 
            $producto->fecha_creacion = date('Y-m-d H:i:s');
            $producto->save(false);
        }
        return $this->redirect(['view']);
    }

    public function actionDelete($id = null){ 
        $db = Yii::$app->db;
        if(!is_null($id))
            $producto = Producto::find()->where(['id' => $id])->one();
            $producto->delete();
        return $this->redirect(['view']);
    }

    public function actionSell($id = null){ 
        $db = Yii::$app->db;
        if(!is_null($id))
            $producto = Producto::find()->where(['id' => $id])->one();
            if($producto->stock > 0){
                $producto->stock = $producto->stock - 1;
                $producto->save(false);
            }
            if($producto->stock == 0){
                $producto->delete();
            }

        return $this->redirect(['view']);
    }
}


?>