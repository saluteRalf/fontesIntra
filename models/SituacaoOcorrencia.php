<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacao_ocorrencia".
 *
 * @property integer $id_sit_ocorrencia
 * @property string $desc_sit_ocorrencia
 *
 * @property Ocorrencia[] $ocorrencias
 */
class SituacaoOcorrencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacao_ocorrencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_sit_ocorrencia'], 'required'],
            [['desc_sit_ocorrencia'], 'string', 'max' => 255],
            [['desc_sit_ocorrencia'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sit_ocorrencia' => 'Id Sit Ocorrencia',
            'desc_sit_ocorrencia' => 'Situação da ocorrência',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['id_sit_ocorrencia' => 'id_sit_ocorrencia']);
    }
}
