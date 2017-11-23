<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "queixa".
 *
 * @property integer $id
 * @property string $apelido
 * @property string $protocolo
 * @property string $criterio_inclusao
 *
 * @property OcorrenciaQueixa[] $ocorrenciaQueixas
 * @property Ocorrencia[] $idOcorrencia
 */
class Queixa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queixa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['criterio_inclusao'], 'string'],
            [['apelido'], 'string', 'max' => 255],
            [['protocolo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apelido' => 'Apelido',
            'protocolo' => 'Protocolo',
            'criterio_inclusao' => 'Criterio Inclusao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrenciaQueixas()
    {
        return $this->hasMany(OcorrenciaQueixa::className(), ['id_queixa' => 'id']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['id' => 'id_ocorrencia'])
			->viaTable('ocorrencia_queixa', ['id_queixa' => 'id']);
    }
}
