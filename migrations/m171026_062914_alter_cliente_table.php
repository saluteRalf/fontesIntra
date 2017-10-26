<?php
use yii\db\Schema;
use yii\db\Migration;

class m171026_062914_alter_cliente_table extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('cliente', 'pre_existentes', Schema::TYPE_TEXT);
        $this->alterColumn('cliente', 'alergias', Schema::TYPE_TEXT);
    }

    public function safeDown()
    {
        $this->alterColumn('cliente', 'pre_existentes', Schema::TYPE_STRING);
        $this->alterColumn('cliente', 'alergias', Schema::TYPE_STRING);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171026_062914_alter_cliente_table cannot be reverted.\n";

        return false;
    }
    */
}
