<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property string $cpf
 * @property string $endereco
 * @property string $pre_existentes
 * @property string $alergias
 * @property integer $tipo_cliente_id
 * @property integer $situacao_pagamento_id
 *
 * @property SituacaoPagamento $situacaoPagamento
 * @property TipoCliente $tipoCliente
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
            [['pre_existentes', 'alergias'], 'string'],
            [['tipo_cliente_id', 'situacao_pagamento_id'], 'integer'],
            [['nome', 'cpf', 'endereco'], 'string', 'max' => 255],
            [['situacao_pagamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => SituacaoPagamento::className(), 'targetAttribute' => ['situacao_pagamento_id' => 'id']],
            [['tipo_cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCliente::className(), 'targetAttribute' => ['tipo_cliente_id' => 'id']],
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
            'cpf' => 'Cpf',
            'endereco' => 'Endereco',
            'pre_existentes' => 'Pre Existentes',
            'alergias' => 'Alergias',
            'tipo_cliente_id' => 'Tipo Cliente ID',
            'situacao_pagamento_id' => 'Situacao Pagamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacaoPagamento()
    {
        return $this->hasOne(SituacaoPagamento::className(), ['id' => 'situacao_pagamento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCliente()
    {
        return $this->hasOne(TipoCliente::className(), ['id' => 'tipo_cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['cliente_id' => 'id']);
    }
}
