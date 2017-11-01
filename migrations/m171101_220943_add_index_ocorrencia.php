<?php
use yii\db\Schema;
use yii\db\Migration;

class m171101_220943_add_index_ocorrencia extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('ocorrencia', 'queixa_inicial_id', Schema::TYPE_INTEGER);

        $this->createIndex(
            'idx-ocorrencia-queixa_inicial_id',
            'ocorrencia',
            'queixa_inicial_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-queixa_inicial_id',
            'ocorrencia',
            'queixa_inicial_id',
            'queixa',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropIndex(
            'idx-ocorrencia-queixa_inicial_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-queixa_inicial_id',
            'ocorrencia'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_220943_add_index_ocorrencia cannot be reverted.\n";

        return false;
    }
    */
}
