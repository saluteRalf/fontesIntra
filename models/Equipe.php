<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipe".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $motorista_id
 * @property integer $tecnico_enfermeiro_id
 * @property integer $enfermeiro_id
 * @property integer $medico_id
 * @property integer $classificacao_id
 * @property integer $em_atendimento
 * @property string $localizacao_atual
 *
 * @property Usuario $medico
 * @property Conduta $classificacao
 * @property Usuario $enfermeiro
 * @property Usuario $motorista
 * @property Usuario $tecnicoEnfermeiro
 * @property Ocorrencia[] $ocorrencias
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
            [['descricao', 'localizacao_atual'], 'string'],
            [['motorista_id', 'tecnico_enfermeiro_id', 'enfermeiro_id', 'medico_id', 'classificacao_id', 'em_atendimento'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['medico_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['medico_id' => 'id']],
            [['classificacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conduta::className(), 'targetAttribute' => ['classificacao_id' => 'id']],
            [['enfermeiro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['enfermeiro_id' => 'id']],
            [['motorista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['motorista_id' => 'id']],
            [['tecnico_enfermeiro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['tecnico_enfermeiro_id' => 'id']],
			[['nome', 'classificacao_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome da equipe',
            'descricao' => 'Descrição',
            'motorista_id' => 'Motorista',
            'tecnico_enfermeiro_id' => 'Técnico enfermeiro',
            'enfermeiro_id' => 'Enfermeiro',
            'medico_id' => 'Médico',
            'classificacao_id' => 'Classificação',
            'em_atendimento' => 'Em atendimento',
            'localizacao_atual' => 'Localizacao Atual',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'medico_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConduta()
    {
        return $this->hasOne(Conduta::className(), ['id' => 'classificacao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnfermeiro()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'enfermeiro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotorista()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'motorista_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTecnicoEnfermeiro()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'tecnico_enfermeiro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['equipe_id' => 'id']);
    }
}
