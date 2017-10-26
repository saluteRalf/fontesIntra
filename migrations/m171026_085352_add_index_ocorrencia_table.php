<?php
use yii\db\Schema;
use yii\db\Migration;

class m171026_085352_add_index_ocorrencia_table extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('ocorrencia', 'cliente_id', Schema::TYPE_INTEGER);

        $this->createIndex(
            'idx-ocorrencia-cliente_id',
            'ocorrencia',
            'cliente_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-cliente_id',
            'ocorrencia',
            'cliente_id',
            'cliente',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-ocorrencia-queixa_inicial_id',
            'ocorrencia',
            'queixa_inicial_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-queixa_inicial_id',
            'ocorrencia',
            'queixa_inicial_id',
            'queixa_inicial',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-ocorrencia-classificacao_id',
            'ocorrencia',
            'classificacao_id'
        );

        $this->addForeignKey(
            'fk-ocorrencia-classificacao_id',
            'ocorrencia',
            'classificacao_id',
            'classificacao',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->alterColumn('ocorrencia', 'cliente_id', Schema::TYPE_TEXT);

        $this->dropIndex(
            'idx-ocorrencia-cliente_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-cliente_id',
            'ocorrencia'
        );

        $this->dropIndex(
            'idx-ocorrencia-queixa_inicial_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-queixa_inicial_id',
            'ocorrencia'
        );

        $this->dropIndex(
            'idx-ocorrencia-classificacao_id',
            'ocorrencia'
        );

        $this->dropForeignKey(
            'fk-ocorrencia-classificacao_id',
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
        echo "m171026_085352_add_index_ocorrencia_table cannot be reverted.\n";

        return false;
    }
    */
}
