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
 * @property integer $equipe_id
 *
 * @property Equipe $equipe
 * @property Cliente $cliente
 * @property Conduta $conduta
 * @property Queixa $queixaInicial
 * @property OcorrenciaQueixa[] $ocorrenciaQueixas
 * @property Queixa[] $idQueixas
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
            [['cliente_id', 'queixa_inicial_id', 'tipo', 'motivo', 'conduta_id', 'equipe_id'], 'integer'],
            [['avaliacao'], 'string'],
            [['numero_ocorrencia', 'cep', 'estado', 'municipio', 'endereco', 'numero', 'complemento', 'referencia'], 'string', 'max' => 255],
            [['equipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipe::className(), 'targetAttribute' => ['equipe_id' => 'id']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['conduta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conduta::className(), 'targetAttribute' => ['conduta_id' => 'id']],
            [['queixa_inicial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Queixa::className(), 'targetAttribute' => ['queixa_inicial_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Número da ocorrência',
            'cliente_id' => 'Cliente',
            'numero_ocorrencia' => 'Numero Ocorrencia',
            'cep' => 'CEP',
            'estado' => 'Estado',
            'municipio' => 'Município',
            'endereco' => 'Endereço',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'referencia' => 'Referência',
            'queixa_inicial_id' => 'Queixa Inicial',
            'tipo' => 'Tipo',
            'motivo' => 'Motivo',
            'avaliacao' => 'Avaliação',
            'conduta_id' => 'Conduta',
            'equipe_id' => 'Equipe',
			'idQueixas' => 'Queixas Iniciais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipe()
    {
        return $this->hasOne(Equipe::className(), ['id' => 'equipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConduta()
    {
        return $this->hasOne(Conduta::className(), ['id' => 'conduta_id']);
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
    public function getOcorrenciaQueixas()
    {
        return $this->hasMany(OcorrenciaQueixa::className(), ['id_ocorrencia' => 'id']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getIdQueixas()
    {
        return $this->hasMany(Queixa::className(), ['id' => 'id_queixa'])
			->viaTable('ocorrencia_queixa', ['id_ocorrencia' => 'id'])
			->orderBy(['queixa.apelido' => SORT_ASC]);
    }
}
