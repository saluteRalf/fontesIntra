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
 *
 * @property Ocorrencia[] $ocorrencias
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
            [['pre_existentes', 'alergias'], 'string'],
            [['nome', 'cpf', 'endereco'], 'string', 'max' => 255],
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
            'cpf' => 'Cpf',
            'pagamento' => 'Pagamento',
            'endereco' => 'Endereco',
            'pre_existentes' => 'Pre Existentes',
            'alergias' => 'Alergias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['cliente_id' => 'id']);
    }
}
