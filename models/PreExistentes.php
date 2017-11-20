<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pre_existentes".
 *
 * @property integer $id_pre_existente
 * @property string $desc_pre_existente
 *
 * @property ClientePree[] $clientePrees
 * @property Cliente[] $idClientes
 */
class PreExistentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pre_existentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_pre_existente'], 'required'],
            [['desc_pre_existente'], 'string', 'max' => 255],
            [['desc_pre_existente'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pre_existente' => 'Id Pre Existente',
            'desc_pre_existente' => 'Preexistente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientePrees()
    {
        return $this->hasMany(ClientePree::className(), ['id_pre_existente' => 'id_pre_existente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClientes()
    {
        return $this->hasMany(Cliente::className(), ['id' => 'id_cliente'])
			->viaTable('cliente_pree', ['id_pre_existente' => 'id_pre_existente'])
			->orderBy(['cliente.nome' => SORT_ASC]);
    }
}
