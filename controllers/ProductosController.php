<?php 

namespace app\controllers;

use Yii;
use app\models\Producto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;


class ProductosController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view', 'create'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionView()
    {

        $productos = new Producto();

        return $this->render('view', ['productos' => $productos]);
    }

    public function actionCreate(){ 
        $request = Yii::$app->request;
        $producto = new Producto();
        $db = Yii::$app->db;
       
        if($request->isPost && $producto->load($request->post()) && $producto->validate()){ 
            $db->createCommand()->insert('productos', [
                'nombre' => $producto->nombre,
                'referencia' => $producto->referencia,
                'precio' => $producto->precio,
                'peso' => $producto->peso,
                'categoria' => $producto->categoria,
                'stock' => $producto->stock, 
                'fecha_creacion' => date('Y-m-d H:i:s')
            ])->execute();
        }
        return $this->redirect(['view']);
    }
}


?>