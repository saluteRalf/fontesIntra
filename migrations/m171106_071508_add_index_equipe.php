<?php
use yii\db\Schema;
use yii\db\Migration;

class m171106_071508_add_index_equipe extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('equipe', 'classificacao_id', Schema::TYPE_INTEGER);

        $this->createIndex(
            'idx-equipe-classificacao_id',
            'equipe',
            'classificacao_id'
        );

        $this->addForeignKey(
            'fk-equipe-classificacao_id',
            'equipe',
            'classificacao_id',
            'conduta',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-equipe-motorista_id',
            'equipe',
            'motorista_id'
        );

        $this->addForeignKey(
            'fk-equipe-motorista_id',
            'equipe',
            'motorista_id',
            'usuario',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-equipe-tecnico_enfermeiro_id',
            'equipe',
            'tecnico_enfermeiro_id'
        );

        $this->addForeignKey(
            'fk-equipe-tecnico_enfermeiro_id',
            'equipe',
            'tecnico_enfermeiro_id',
            'usuario',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-equipe-enfermeiro_id',
            'equipe',
            'enfermeiro_id'
        );

        $this->addForeignKey(
            'fk-equipe-enfermeiro_id',
            'equipe',
            'enfermeiro_id',
            'usuario',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-equipe-medico_id',
            'equipe',
            'medico_id'
        );

        $this->addForeignKey(
            'fk-equipe-medico_id',
            'equipe',
            'medico_id',
            'usuario',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->execute('ALTER TABLE equipe DROP COLUMN `classificacao_id` ');

        $this->dropIndex(
            'idx-equipe-classificacao_id',
            'equipe'
        );

        $this->dropForeignKey(
            'fk-equipe-classificacao_id',
            'equipe'
        );

        $this->dropIndex(
            'idx-equipe-motorista_id',
            'equipe'
        );

        $this->dropForeignKey(
            'fk-equipe-motorista_id',
            'equipe'
        );

        $this->dropIndex(
            'idx-equipe-tecnico_enfermeiro_id',
            'equipe'
        );

        $this->dropForeignKey(
            'fk-equipe-tecnico_enfermeiro_id',
            'equipe'
        );

        $this->dropIndex(
            'idx-equipe-enfermeiro_id',
            'equipe'
        );

        $this->dropForeignKey(
            'fk-equipe-enfermeiro_id',
            'equipe'
        );

        $this->dropIndex(
            'idx-equipe-medico_id',
            'equipe'
        );

        $this->dropForeignKey(
            'fk-equipe-medico_id',
            'equipe'
        );
    }
}
