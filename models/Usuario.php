<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $tipo_usuario_id
 * @property string $senha
 *
 * @property Equipe[] $equipes
 * @property Equipe[] $equipes0
 * @property Equipe[] $equipes1
 * @property Equipe[] $equipes2
 * @property TipoUsuario $tipoUsuario
 */
class Usuario extends \yii\db\ActiveRecord
{
	public $repeatSenha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_usuario_id'], 'integer'],
            [['nome', 'senha', 'cpf', 'nr_classe', 'repeatSenha'], 'string', 'max' => 255],
			[['senha', 'repeatSenha'], 'required'],
            [['tipo_usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoUsuario::className(), 'targetAttribute' => ['tipo_usuario_id' => 'id']],
			['repeatSenha', 'compare', 'compareAttribute'=>'senha', 'message'=>"A senha repetida deve ser igual"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'tipo_usuario_id' => 'Função',
			'cpf' => 'CPF',
			'nr_classe' => 'CNH/CRM/COREN',
            'senha' => 'Senha',
			'repeatSenha' => 'Repetir senha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipes()
    {
        return $this->hasMany(Equipe::className(), ['medico_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipes0()
    {
        return $this->hasMany(Equipe::className(), ['enfermeiro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipes1()
    {
        return $this->hasMany(Equipe::className(), ['motorista_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipes2()
    {
        return $this->hasMany(Equipe::className(), ['tecnico_enfermeiro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUsuario()
    {
        return $this->hasOne(TipoUsuario::className(), ['id' => 'tipo_usuario_id']);
    }
}
