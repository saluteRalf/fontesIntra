<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
	public $desc_pre_existente;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'situacao_pagamento_id'], 'integer'],
            [['nome', 'cpf', 'endereco', 'pre_existentes', 'alergias', 'numero', 'complemento', 'bairro', 'cep', 'municipio', 'estado', 'referencia', 'desc_pre_existente'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cliente::find()->innerJoinWith('idPreExistentes', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort' => ['attributes' => ['cpf', 'nome', 'desc_pre_existente']]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'alergias', $this->alergias])
            ->andFilterWhere(['like', 'desc_pre_existente', $this->desc_pre_existente]);

        return $dataProvider;
    }
}
