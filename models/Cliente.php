<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $titular
 * @property string $cpf
 * @property integer $pagamento
 * @property string $endereco
 * @property string $pre_existentes
 * @property string $alergias
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titular', 'pagamento'], 'integer'],
            [['nome', 'cpf', 'endereco', 'pre_existentes', 'alergias'], 'string', 'max' => 255],
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
            'titular' => 'Titular',
            'cpf' => 'CPF',
            'pagamento' => 'Situação financeira',
            'endereco' => 'Endereço',
            'pre_existentes' => 'Pre-existentes',
            'alergias' => 'Alergias',
        ];
    }
}
