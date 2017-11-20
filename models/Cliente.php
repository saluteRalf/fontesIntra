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
 * @property string $numero
 * @property string $bairro
 * @property string $municipio
 * @property string $estado
 * @property string $referencia
 * @property string $complemento
 * @property string $cep
 *
 * @property SituacaoPagamento $situacaoPagamento
 * @property TipoCliente $tipoCliente
 * @property Ocorrencia[] $ocorrencias
 * @property ClientePree[] $clientePrees
 * @property PreExistentes[] $idPreExistentes
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
            [['nome', 'cpf', 'endereco', 'numero', 'complemento', 'bairro', 'cep', 'municipio', 'referencia'], 'string', 'max' => 255],
			[['estado'], 'string', 'max' => 2],
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
            'cpf' => 'CPF',
            'endereco' => 'Endereço',
            'pre_existentes' => 'Pré-existentes',
            'alergias' => 'Alergias',
            'tipo_cliente_id' => 'Tipo',
            'situacao_pagamento_id' => 'Pagamento',
			'numero' => 'Número',
			'complemento' => 'Complemento',
			'bairro' => 'Bairro',
			'cep' => 'CEP',
			'municipio' => 'Município',
			'estado' => 'UF',
			'referencia' => 'Referência',
			'idPreExistentes' => 'Preexistentes'
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientePrees()
    {
        return $this->hasMany(ClientePree::className(), ['id_cliente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPreExistentes()
    {
        return $this->hasMany(PreExistentes::className(), ['id_pre_existente' => 'id_pre_existente'])
			->viaTable('cliente_pree', ['id_cliente' => 'id'])
			->orderBy(['pre_existentes.desc_pre_existente' => SORT_ASC]);
    }
}
