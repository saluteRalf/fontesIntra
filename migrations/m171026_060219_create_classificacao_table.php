<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `classificacao`.
 */
class m171026_060219_create_classificacao_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('classificacao', [
            'id' => $this->primaryKey(),
            'nomenclatura' => Schema::TYPE_STRING,
            'descricao' => Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('classificacao');
    }
}
