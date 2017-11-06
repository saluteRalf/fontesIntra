<?php

use yii\db\Migration;

class m171106_061041_alter_equipe_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('equipe', 'nome', 'VARCHAR(50) AFTER `id` ');
        $this->addColumn('equipe', 'descricao', 'TEXT AFTER `nome` ');
    }

    public function safeDown()
    {
        $this->execute('ALTER TABLE equipe DROP COLUMN `nome` ');
        $this->execute('ALTER TABLE equipe DROP COLUMN `descricao` ');
    }
}
