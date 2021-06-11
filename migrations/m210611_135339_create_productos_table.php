<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%productos}}`.
 */
class m210611_135339_create_productos_table extends Migration
{

    public function up(){ 
        $this->createTable('{{%productos}}', [
            'id' => $this->primaryKey(),
            'nombre' =>  $this->string()->notNull(),
            'referencia' =>  $this->string()->notNull(),
            'precio' =>  $this->integer()->notNull(),
            'peso' =>  $this->integer()->notNull(),
            'categoria' =>  $this->string()->notNull(),
            'stock' =>  $this->integer()->notNull(),
            'fecha_creacion' => $this->datetime()->notNull(),
            'fecha_ultima_venta' =>  $this->datetime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%productos}}');
    }
}
