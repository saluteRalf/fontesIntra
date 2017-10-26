<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `usuario`.
 */
class m171023_045847_create_usuario_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'nome' => Schema::TYPE_STRING,
            'senha' => Schema::TYPE_STRING
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('usuario');
    }
}
