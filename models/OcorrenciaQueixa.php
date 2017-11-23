<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ocorrencia_queixa".
 *
 * @property integer $id_ocorrencia_queixa
 * @property integer $id_ocorrencia
 * @property integer $id_queixa
 *
 * @property Ocorrencia $idOcorrencia
 * @property Queixa $idQueixa
 */
class OcorrenciaQueixa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ocorrencia_queixa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ocorrencia', 'id_queixa'], 'required'],
            [['id_ocorrencia', 'id_queixa'], 'integer'],
            [['id_ocorrencia'], 'exist', 'skipOnError' => true, 'targetClass' => Ocorrencia::className(), 'targetAttribute' => ['id_ocorrencia' => 'id']],
            [['id_queixa'], 'exist', 'skipOnError' => true, 'targetClass' => Queixa::className(), 'targetAttribute' => ['id_queixa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ocorrencia_queixa' => 'Id Ocorrencia Queixa',
            'id_ocorrencia' => 'Id Ocorrencia',
            'id_queixa' => 'Id Queixa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOcorrencia()
    {
        return $this->hasOne(Ocorrencia::className(), ['id' => 'id_ocorrencia'])->inverseOf('ocorrenciaQueixas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdQueixa()
    {
        return $this->hasOne(Queixa::className(), ['id' => 'id_queixa'])->inverseOf('ocorrenciaQueixas');
    }
}
