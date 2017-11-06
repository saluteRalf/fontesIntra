<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacao_pagamento".
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Cliente[] $clientes
 */
class SituacaoPagamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacao_pagamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['situacao_pagamento_id' => 'id']);
    }
}
