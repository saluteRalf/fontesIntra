<?php

use yii\db\Migration;

class m171106_115735_add_index_cliente extends Migration
{
    public function safeUp()
    {
        $this->addColumn('cliente', 'tipo_cliente_id', 'INT(11)');
        $this->execute('ALTER TABLE cliente DROP COLUMN `titular` ');

        $this->createIndex(
            'idx-cliente-tipo_cliente_id',
            'cliente',
            'tipo_cliente_id'
        );

        $this->addForeignKey(
            'fk-cliente-tipo_cliente_id',
            'cliente',
            'tipo_cliente_id',
            'tipo_cliente',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->addColumn('cliente', 'titular', 'tinyint(1)');
        $this->dropIndex(
            'idx-cliente-tipo_cliente_id',
            'cliente'
        );

        $this->dropForeignKey(
            'fk-cliente-tipo_cliente_id',
            'cliente'
        );
    }
}
