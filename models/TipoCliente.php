<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_cliente".
 *
 * @property integer $id
 * @property string $nomenclatura
 *
 * @property Cliente[] $clientes
 */
class TipoCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomenclatura'], 'required'],
            [['nomenclatura'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomenclatura' => 'Nomenclatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['tipo_cliente_id' => 'id']);
    }
}
