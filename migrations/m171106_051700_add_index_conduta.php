<?php
use yii\db\Schema;
use yii\db\Migration;

class m171106_051700_add_index_conduta extends Migration
{
    public function safeUp()
    {
        $this->createIndex(
            'idx-ocorrencia-conduta_id',
            'ocorrencia',
            'conduta_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-conduta_id',
            'ocorrencia',
            'conduta_id',
            'conduta',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropIndex(
            'idx-ocorrencia-conduta_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-conduta_id',
            'ocorrencia'
        );
    }
}
