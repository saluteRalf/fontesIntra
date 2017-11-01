<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ocorrencia".
 *
 * @property integer $id
 * @property integer $cliente_id
 * @property string $numero_ocorrencia
 * @property string $cep
 * @property string $estado
 * @property string $municipio
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $referencia
 * @property integer $queixa_inicial_id
 * @property integer $tipo
 * @property integer $motivo
 * @property string $avaliacao
 * @property integer $conduta_id
 *
 * @property Queixa $queixaInicial
 * @property Cliente $cliente
 */
class Ocorrencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ocorrencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'queixa_inicial_id', 'tipo', 'motivo', 'conduta_id'], 'integer'],
            [['avaliacao'], 'string'],
            [['numero_ocorrencia', 'cep', 'estado', 'municipio', 'endereco', 'numero', 'complemento', 'referencia'], 'string', 'max' => 255],
            [['queixa_inicial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Queixa::className(), 'targetAttribute' => ['queixa_inicial_id' => 'id']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente ID',
            'numero_ocorrencia' => 'Numero Ocorrencia',
            'cep' => 'Cep',
            'estado' => 'Estado',
            'municipio' => 'Municipio',
            'endereco' => 'Endereco',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'referencia' => 'Referencia',
            'queixa_inicial_id' => 'Queixa Inicial ID',
            'tipo' => 'Tipo',
            'motivo' => 'Motivo',
            'avaliacao' => 'Avaliacao',
            'conduta_id' => 'Conduta ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQueixaInicial()
    {
        return $this->hasOne(Queixa::className(), ['id' => 'queixa_inicial_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }
}
