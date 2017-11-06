<?php
use yii\db\Migration;

/**
 * Handles the creation of table `conduta`.
 */
class m171105_000359_create_conduta_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('conduta', [
            'id' => $this->primaryKey(),
            'sigla' => $this->string(50)->notNull(),
            'descricao' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('conduta');
    }
}
