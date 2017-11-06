<?php

use yii\db\Migration;

class m171106_130423_insert_situacao_pagamento extends Migration
{
    public function safeUp()
    {
        $this->insert('situacao_pagamento',array('descricao'=>'Em dia'));
        $this->insert('situacao_pagamento',array('descricao'=>'Em atraso'));
        $this->insert('situacao_pagamento',array('descricao'=>'Em atraso (mais que três meses)'));
    }

    public function safeDown()
    {
        echo "m171106_130423_insert_situacao_pagamento cannot be reverted.\n";

        return false;
    }
}
