<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `ocorrencia`.
 */
class m171025_225518_create_ocorrencia_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ocorrencia', [
            'id' => $this->primaryKey(),
            'cliente_id' => Schema::TYPE_STRING,
            'numero_ocorrencia' => Schema::TYPE_STRING,
            'cep' => Schema::TYPE_STRING,
            'estado' => Schema::TYPE_STRING,
            'municipio' => Schema::TYPE_STRING,
            'endereco' => Schema::TYPE_STRING,
            'numero' => Schema::TYPE_STRING,
            'complemento' => Schema::TYPE_STRING,
            'referencia' => Schema::TYPE_STRING,
            'queixa_inicial_id' => Schema::TYPE_INTEGER,
            'tipo' => Schema::TYPE_INTEGER,
            'motivo' => Schema::TYPE_INTEGER,
            'avaliacao' => Schema::TYPE_TEXT,
            'conduta_id' => Schema::TYPE_INTEGER,

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ocorrencia');
    }
}
