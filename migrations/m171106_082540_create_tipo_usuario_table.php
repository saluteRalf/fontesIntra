<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tipo_usuario`.
 */
class m171106_082540_create_tipo_usuario_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tipo_usuario', [
            'id' => $this->primaryKey(),
            'nomenclatura' => $this->string(50)->notNull(),
            'descricao' => $this->text(),
        ]);

        $this->execute('ALTER TABLE usuario DROP COLUMN `funcao` ');

        $this->addColumn('usuario', 'tipo_usuario_id', 'INT(3) AFTER `nome` ');

        $this->createIndex(
            'idx-usuario-tipo_usuario_id',
            'usuario',
            'tipo_usuario_id'
        );

        $this->addForeignKey(
            'fk-usuario-tipo_usuario_id',
            'usuario',
            'tipo_usuario_id',
            'tipo_usuario',
            'id',
            'CASCADE'
        );

        $this->insert('tipo_usuario',array('nomenclatura'=>'TARM','descricao' =>''));
        $this->insert('tipo_usuario',array('nomenclatura'=>'Motorista','descricao' =>''));
        $this->insert('tipo_usuario',array('nomenclatura'=>'Médico','descricao' =>''));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tipo_usuario');
        $this->addColumn('usuario', 'funcao', 'INT(2) AFTER `nome` ');
        $this->execute('ALTER TABLE usuario DROP COLUMN `tipo_usuario_id` ');

        $this->dropIndex(
            'idx-usuario-tipo_usuario_id',
            'usuario'
        );

        $this->dropForeignKey(
            'fk-usuario-tipo_usuario_id',
            'usuario'
        );
    }
}
