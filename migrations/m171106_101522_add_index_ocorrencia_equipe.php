<?php

use yii\db\Migration;

class m171106_101522_add_index_ocorrencia_equipe extends Migration
{
    public function safeUp()
    {
        $this->addColumn('ocorrencia', 'equipe_id', 'INT(5)');
        $this->createIndex(
            'idx-ocorrencia-equipe_id',
            'ocorrencia',
            'equipe_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-equipe_id',
            'ocorrencia',
            'equipe_id',
            'equipe',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->execute('ALTER TABLE ocorrencia DROP COLUMN `equipe_id` ');
        $this->dropIndex(
            'idx-ocorrencia-equipe_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-equipe_id',
            'ocorrencia'
        );
    }
}
