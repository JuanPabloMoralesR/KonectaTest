<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Producto extends ActiveRecord
{    

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'productos';
    }

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

}


?>