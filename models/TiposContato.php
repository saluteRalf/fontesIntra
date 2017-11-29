<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_contato".
 *
 * @property integer $id_tp_contato
 * @property string $desc_tp_contato
 *
 * @property ContatosCliente[] $contatosClientes
 */
class TiposContato extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_contato';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_tp_contato'], 'string', 'max' => 255],
            [['desc_tp_contato'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tp_contato' => 'Id Tp Contato',
            'desc_tp_contato' => 'Desc Tp Contato',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContatosClientes()
    {
        return $this->hasMany(ContatosCliente::className(), ['id_tipo_contato' => 'id_tp_contato']);
    }
}
