<?php

use yii\db\Migration;

class m171106_054637_add_lines_conduta extends Migration
{
    public function safeUp()
    {
        $this->insert('conduta',array('sigla'=>'Finalização','descricao' =>''));
        $this->insert('conduta',array('sigla'=>'SBV','descricao' =>''));
        $this->insert('conduta',array('sigla'=>'SIV','descricao' =>''));
        $this->insert('conduta',array('sigla'=>'SAV','descricao' =>''));
    }

    public function safeDown()
    {
        $this->truncate('conduta');
    }
}
