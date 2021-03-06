<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conduta".
 *
 * @property integer $id
 * @property string $nomenclatura
 * @property string $descricao
 *
 * @property Ocorrencia[] $ocorrencias
 */
class Conduta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conduta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomenclatura'], 'required'],
            [['descricao'], 'string'],
            [['nomenclatura'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomenclatura' => 'Nomenclatura',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['conduta_id' => 'id']);
    }
}
