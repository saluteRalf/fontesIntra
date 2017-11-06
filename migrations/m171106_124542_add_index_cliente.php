<?php

use yii\db\Migration;

class m171106_124542_add_index_cliente extends Migration
{
    public function safeUp()
    {
        $this->addColumn('cliente', 'situacao_pagamento_id', 'INT(11)');
        $this->execute('ALTER TABLE cliente DROP COLUMN `pagamento` ');

        $this->createIndex(
            'idx-cliente-situacao_pagamento_id',
            'cliente',
            'situacao_pagamento_id'
        );

        $this->addForeignKey(
            'fk-cliente-situacao_pagamento_id',
            'cliente',
            'situacao_pagamento_id',
            'situacao_pagamento',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->execute('ALTER TABLE cliente DROP COLUMN `situacao_pagamento_id` ');
        $this->addColumn('cliente', 'pagamento', 'INT(11)');
        
        $this->dropIndex(
            'idx-cliente-situacao_pagamento_id',
            'cliente'
        );

        $this->dropForeignKey(
            'fk-cliente-situacao_pagamento_id',
            'cliente'
        );
    }
}
