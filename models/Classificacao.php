<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "classificacao".
 *
 * @property integer $id
 * @property string $sigla
 * @property string $descricao
 */
class Classificacao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificacao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'string'],
            [['sigla'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sigla' => 'Sigla',
            'descricao' => 'Descrição',
        ];
    }
}
