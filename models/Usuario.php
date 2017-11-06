<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $funcao
 * @property string $senha
 *
 * @property Equipe[] $equipes
 * @property Equipe[] $equipes0
 * @property Equipe[] $equipes1
 * @property Equipe[] $equipes2
 */
class Usuario extends \yii\db\ActiveRecord
{
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
            [['funcao'], 'integer'],
            [['nome', 'senha'], 'string', 'max' => 255],
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
            'funcao' => 'Funcao',
            'senha' => 'Senha',
            'DescFuncao' => 'Função',
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

    static function getAvaileblesFuncao()
    {
        return ['Motorista','TARM','Médico'];
    }

    public function getDescFuncao ()
    {
        return self::getAvaileblesFuncao()[$this->funcao];
    }
}
