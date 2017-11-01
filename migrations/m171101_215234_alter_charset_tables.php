<?php

use yii\db\Migration;

class m171101_215234_alter_charset_tables extends Migration
{
    public function safeUp()
    {
        $this->execute('ALTER TABLE cliente CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE classificacao CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE equipe CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE ocorrencia CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE queixa CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
        $this->execute('ALTER TABLE usuario CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci');
    }

    public function safeDown()
    {
        $this->execute('ALTER TABLE cliente CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        $this->execute('ALTER TABLE classificacao CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        $this->execute('ALTER TABLE equipe CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        $this->execute('ALTER TABLE ocorrencia CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        $this->execute('ALTER TABLE queixa CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        $this->execute('ALTER TABLE usuario CONVERT TO CHARACTER SET latin1 COLLATE latin1_swedish_ci');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_215234_alter_charset_tables cannot be reverted.\n";

        return false;
    }
    */
}
