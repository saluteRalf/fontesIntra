<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $nome
 * @property string $cpf
 * @property integer $pagamento
 * @property string $endereco
 * @property string $pre_existentes
 * @property string $alergias
 * @property integer $tipo_cliente_id
 *
 * @property TipoCliente $tipoCliente
 * @property Ocorrencia[] $ocorrencias
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pagamento', 'tipo_cliente_id'], 'integer'],
            [['pre_existentes', 'alergias'], 'string'],
            [['nome', 'cpf', 'endereco'], 'string', 'max' => 255],
            [['tipo_cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCliente::className(), 'targetAttribute' => ['tipo_cliente_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'pagamento' => 'Pagamento',
            'endereco' => 'Endereco',
            'pre_existentes' => 'Pre Existentes',
            'alergias' => 'Alergias',
            'tipo_cliente_id' => 'Tipo Cliente ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCliente()
    {
        return $this->hasOne(TipoCliente::className(), ['id' => 'tipo_cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcorrencias()
    {
        return $this->hasMany(Ocorrencia::className(), ['cliente_id' => 'id']);
    }
}
