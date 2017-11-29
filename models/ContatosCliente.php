<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contatos_cliente".
 *
 * @property integer $id_contato_cliente
 * @property integer $id_cliente
 * @property integer $id_tipo_contato
 * @property string $desc_contato
 * @property string $observacao
 *
 * @property TiposContato $idTipoContato
 * @property Cliente $idCliente
 * @property Pagamentos[] $pagamentos
 */
class ContatosCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contatos_cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_tipo_contato', 'desc_contato'], 'required'],
            [['id_cliente', 'id_tipo_contato'], 'integer'],
            [['desc_contato', 'observacao'], 'string', 'max' => 255],
            [['id_cliente', 'id_tipo_contato', 'desc_contato'], 'unique', 'targetAttribute' => ['id_cliente', 'id_tipo_contato', 'desc_contato'], 'message' => 'The combination of Cliente, Tipo de Contato and Descrição has already been taken.'],
            [['id_tipo_contato'], 'exist', 'skipOnError' => true, 'targetClass' => TiposContato::className(), 'targetAttribute' => ['id_tipo_contato' => 'id_tp_contato']],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contato_cliente' => 'Id Contato Cliente',
            'id_cliente' => 'Cliente',
            'id_tipo_contato' => 'Tipo de Contato',
            'desc_contato' => 'Descrição',
            'observacao' => 'Observação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoContato()
    {
        return $this->hasOne(TiposContato::className(), ['id_tp_contato' => 'id_tipo_contato']);
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
    public function getPagamentos()
    {
        return $this->hasMany(Pagamentos::className(), ['id_contrato' => 'id_contato_cliente']);
    }
}
