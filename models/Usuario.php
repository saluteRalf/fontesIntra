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
            'funcao' => 'Função',
            'DescFuncao' => 'Função',
            'senha' => 'Senha',
        ];
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
