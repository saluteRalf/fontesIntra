<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente_pree".
 *
 * @property integer $id_cliente_pree
 * @property integer $id_cliente
 * @property integer $id_pre_existente
 *
 * @property Cliente $idCliente
 * @property PreExistentes $idPreExistente
 */
class ClientePree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente_pree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_pre_existente'], 'integer'],
			[['id_cliente', 'id_pre_existente'], 'unique', 'targetAttribute' => ['id_cliente', 'id_pre_existente'], 'message' => 'O Cliente já possui o Preexistente em questão.'], 
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
            [['id_pre_existente'], 'exist', 'skipOnError' => true, 'targetClass' => PreExistentes::className(), 'targetAttribute' => ['id_pre_existente' => 'id_pre_existente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_pree' => 'Id Cliente Pree',
            'id_cliente' => 'Cliente',
            'id_pre_existente' => 'Preexistente',
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
    public function getIdPreExistente()
    {
        return $this->hasOne(PreExistentes::className(), ['id_pre_existente' => 'id_pre_existente']);
    }
}
