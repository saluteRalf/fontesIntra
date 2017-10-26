<?php

use yii\db\Migration;

class m171024_132912_add_field_tipo_usuario extends Migration
{
    public function up()
    {
        $this->addColumn('usuario', 'funcao', 'INT(2) AFTER `nome` ');
    }

    public function down()
    {
        $this->execute('ALTER TABLE usuario DROP COLUMN `funcao` ');
    }
}
