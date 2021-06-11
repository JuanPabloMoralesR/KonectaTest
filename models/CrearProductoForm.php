<?php 

namespace app\models;

use yii\base\Model;

class CrearProductoForm extends Model
{    

    public $id;
    public $nombre; 
    public $referencia; 
    public $precio; 
    public $peso; 
    public $categoria; 
    public $stock; 
    public $fecha_creacion; 
    public $fecha_ultima_venta;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public function rules()
    {
        return [
            [['nombre', 'referencia', 'precio', 'peso', 'categoria', 'stock'], 'required'],
            [['fecha_creacion', 'fecha_ultima_venta'], 'datetime'],
            [['id','fecha_creacion', 'fecha_ultima_venta'], 'safe'], 
            [['nombre', 'referencia', 'categoria'], 'string', 'max' => 150], 
            [['precio', 'peso', 'stock'], 'number', 'min' => 0, 'integerOnly' => true]
        ];
    }

    public function formName()
    {
        return 'Productos';
    }

}


?>