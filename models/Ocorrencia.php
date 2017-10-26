<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ocorrencia".
 *
 * @property integer $id
 * @property string $cliente_id
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
            [['queixa_inicial_id', 'tipo', 'motivo', 'conduta_id'], 'integer'],
            [['avaliacao'], 'string'],
            [['cliente_id', 'numero_ocorrencia', 'cep', 'estado', 'municipio', 'endereco', 'numero', 'complemento', 'referencia'], 'string', 'max' => 255],
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
}
