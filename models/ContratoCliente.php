<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contrato_cliente".
 *
 * @property integer $id_contrato
 * @property integer $id_cliente
 * @property string $dt_vigencia_inicio
 * @property string $dt_vigencia_fim
 * @property integer $dt_vencimento
 * @property integer $id_situacao
 *
 * @property Cliente $idCliente
 * @property SituacaoBase $idSituacao
 */
class ContratoCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contrato_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente'], 'required'],
            [['id_cliente', 'dt_vencimento', 'id_situacao'], 'integer'],
            [['dt_vigencia_inicio', 'dt_vigencia_fim'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
			[['id_situacao'], 'exist', 'skipOnError' => true, 'targetClass' => SituacaoBase::className(), 'targetAttribute' => ['id_situacao' => 'id_situacao_base']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contrato' => 'Id Contrato',
            'id_cliente' => 'Cliente do contrato',
            'dt_vigencia_inicio' => 'Data inicial de vigência',
            'dt_vigencia_fim' => 'Data final de vigência',
            'dt_vencimento' => 'Dia de vencimento',
			'id_situacao' => 'Situação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
	
	/** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getIdSituacao() 
    { 
		return $this->hasOne(SituacaoBase::className(), ['id_situacao_base' => 'id_situacao']); 
    }
}
