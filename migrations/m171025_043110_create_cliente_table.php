<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `cliente`.
 */
class m171025_043110_create_cliente_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cliente', [
            'id' => $this->primaryKey(),
            'nome' => Schema::TYPE_STRING,
            'titular' => Schema::TYPE_BOOLEAN,
            'cpf' => Schema::TYPE_STRING,
            'pagamento' => Schema::TYPE_INTEGER,
            'endereco' => Schema::TYPE_STRING,
            'pre_existentes' => Schema::TYPE_STRING,
            'alergias' => Schema::TYPE_STRING,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cliente');
    }
}
