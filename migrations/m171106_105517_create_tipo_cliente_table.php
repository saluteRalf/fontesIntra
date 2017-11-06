<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tipo_cliente`.
 */
class m171106_105517_create_tipo_cliente_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tipo_cliente', [
            'id' => $this->primaryKey(),
            'nomenclatura' => $this->string(50)->notNull(),
        ]);

        $this->insert('tipo_cliente',array('nomenclatura'=>'Titular'));
        $this->insert('tipo_cliente',array('nomenclatura'=>'Dependente'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tipo_cliente');
    }
}
