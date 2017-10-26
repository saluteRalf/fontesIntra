<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `queixa`.
 */
class m171026_055416_create_queixa_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('queixa', [
            'id' => $this->primaryKey(),
            'apelido' => Schema::TYPE_STRING,
            'protocolo' => Schema::TYPE_STRING,
            'criterio_inclusao' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('queixa');
    }
}
