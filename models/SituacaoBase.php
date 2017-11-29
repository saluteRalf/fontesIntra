<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacao_base".
 *
 * @property integer $id_situacao_base
 * @property string $desc_situacao_base
 */
class SituacaoBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacao_base';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_situacao_base'], 'string', 'max' => 255],
            [['desc_situacao_base'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_situacao_base' => 'Id Situacao Base',
            'desc_situacao_base' => 'Desc Situacao Base',
        ];
    }
}
