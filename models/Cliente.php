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
 * @property string $dt_nascimento 
 * @property integer $cod_banco 
 * @property integer $cod_agencia 
 * @property integer $cod_conta
 * @property integer $id_dependente 
 * @property string $tel_residencial 
 * @property string $tel_trabalho 
 * @property string $tel_celular 
 * @property string $email
 *
 * @property Cliente $idDependente 
 * @property Cliente[] $clientes
 * @property SituacaoPagamento $situacaoPagamento
 * @property TipoCliente $tipoCliente
 * @property Ocorrencia[] $ocorrencias
 * @property ClientePree[] $clientePrees
 * @property PreExistentes[] $idPreExistentes
 * @property ContatosCliente[] $contatosClientes
 * @property Pagamentos[] $pagamentos
 * @property ContratoCliente[] $contratoClientes
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
            [['tipo_cliente_id', 'situacao_pagamento_id', 'cod_banco', 'cod_agencia', 'cod_conta', 'id_dependente'], 'integer'],
            [['nome', 'cpf', 'endereco', 'numero', 'complemento', 'bairro', 'cep', 'municipio', 'referencia', 'tel_residencial', 'tel_trabalho', 'tel_celular', 'email'], 'string', 'max' => 255],
			[['estado'], 'string', 'max' => 2],
            [['dt_nascimento'], 'safe'],
            [['cpf'], 'unique'],
            [['cod_banco', 'cod_agencia', 'cod_conta'], 'unique', 'targetAttribute' => ['cod_banco', 'cod_agencia', 'cod_conta'], 'message' => 'A combinação Banco/Agência/Conta já está cadastrada para outro cliente.'],
            [['situacao_pagamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => SituacaoPagamento::className(), 'targetAttribute' => ['situacao_pagamento_id' => 'id']],
            [['tipo_cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCliente::className(), 'targetAttribute' => ['tipo_cliente_id' => 'id']],
            [['id_dependente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_dependente' => 'id']],
			
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
            'pre_existentes' => 'Outros Preexistentes',
            'alergias' => 'Alergias medicamentosas',
            'tipo_cliente_id' => 'Tipo',
            'situacao_pagamento_id' => 'Pagamento',
			'numero' => 'Número',
			'complemento' => 'Complemento',
			'bairro' => 'Bairro',
			'cep' => 'CEP',
			'municipio' => 'Município',
			'estado' => 'UF',
			'referencia' => 'Referência',
			'idPreExistentes' => 'Preexistentes',
            'dt_nascimento' => 'Data de Nascimento',
            'cod_banco' => 'Cód. Banco',
            'cod_agencia' => 'Agência',
            'cod_conta' => 'Conta',
            'id_dependente' => 'Dependente',
			'tel_residencial' => 'Tel. Residencial',
            'tel_trabalho' => 'Tel. Trabalho',
            'tel_celular' => 'Celular',
            'email' => 'E-mail',
        ];
    }
	
	/** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getIdDependente() 
   { 
       return $this->hasOne(Cliente::className(), ['id' => 'id_dependente']); 
   } 
 
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getClientes() 
   { 
       return $this->hasMany(Cliente::className(), ['id_dependente' => 'id']); 
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
	
	/**
    * @return \yii\db\ActiveQuery
    */
    public function getContatosClientes()
    {
        return $this->hasMany(ContatosCliente::className(), ['id_cliente' => 'id']);
    }
	
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getContratoClientes()
    {
        return $this->hasMany(ContratoCliente::className(), ['id_cliente' => 'id']);
    }
	
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamentos::className(), ['id_cliente' => 'id']);
    }
}
