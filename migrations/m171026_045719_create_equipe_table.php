<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `equipe`.
 */
class m171026_045719_create_equipe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('equipe', [
            'id' => $this->primaryKey(),
            'motorista_id' => Schema::TYPE_INTEGER,
            'tecnico_enfermeiro_id' => Schema::TYPE_INTEGER,
            'enfermeiro_id' => Schema::TYPE_INTEGER,
            'medico_id' => Schema::TYPE_INTEGER,
            'classificacao_id' => Schema::TYPE_STRING,
            'em_atendimento' => Schema::TYPE_BOOLEAN,
            'localizacao_atual' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('equipe');
    }
}
