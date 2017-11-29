<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamentos".
 *
 * @property integer $id_pagamento
 * @property integer $id_cliente
 * @property string $dt_pagamento
 * @property integer $cod_banco
 * @property integer $cod_agencia
 * @property integer $cod_conta
 * @property string $vl_pgto
 * @property integer $id_contrato
 *
 * @property ContatosCliente $idContrato
 * @property Cliente $idCliente
 */
class Pagamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'cod_banco', 'cod_agencia', 'cod_conta', 'id_contrato'], 'integer'],
            [['dt_pagamento'], 'safe'],
            [['vl_pgto'], 'number'],
            [['id_contrato'], 'exist', 'skipOnError' => true, 'targetClass' => ContatosCliente::className(), 'targetAttribute' => ['id_contrato' => 'id_contato_cliente']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pagamento' => 'Id Pagamento',
            'id_cliente' => 'Cliente',
            'dt_pagamento' => 'Data do Pagamento',
            'cod_banco' => 'Banco',
            'cod_agencia' => 'Agência',
            'cod_conta' => 'Conta',
            'vl_pgto' => 'Valor Pago',
            'id_contrato' => 'Contrato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdContrato()
    {
        return $this->hasOne(ContatosCliente::className(), ['id_contato_cliente' => 'id_contrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'id_cliente']);
    }
}
