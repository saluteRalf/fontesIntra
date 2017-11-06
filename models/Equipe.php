<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipe".
 *
 * @property integer $id
 * @property integer $motorista_id
 * @property integer $tecnico_enfermeiro_id
 * @property integer $enfermeiro_id
 * @property integer $medico_id
 * @property string $classificacao_id
 * @property integer $em_atendimento
 * @property string $localizacao_atual
 */
class Equipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['motorista_id', 'tecnico_enfermeiro_id', 'enfermeiro_id', 'medico_id', 'em_atendimento'], 'integer'],
            [['localizacao_atual'], 'string'],
            [['classificacao_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'motorista_id' => 'Motorista ID',
            'tecnico_enfermeiro_id' => 'Tecnico Enfermeiro ID',
            'enfermeiro_id' => 'Enfermeiro ID',
            'medico_id' => 'Medico ID',
            'classificacao_id' => 'Classificacao ID',
            'em_atendimento' => 'Em Atendimento',
            'localizacao_atual' => 'Localizacao Atual',
        ];
    }
}
