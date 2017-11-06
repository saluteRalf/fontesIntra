<?php

use yii\db\Migration;

/**
 * Handles the creation of table `situacao_pagamento`.
 */
class m171106_123020_create_situacao_pagamento_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('situacao_pagamento', [
            'id' => $this->primaryKey(),
            'descricao' => $this->string(100),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('situacao_pagamento');
    }
}
