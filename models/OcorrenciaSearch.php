<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ocorrencia;

/**
 * OcorrenciaSearch represents the model behind the search form about `app\models\Ocorrencia`.
 */
class OcorrenciaSearch extends Ocorrencia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id', 'tipo', 'motivo', 'conduta_id'], 'integer'],
            [['numero_ocorrencia', 'cep', 'estado', 'municipio', 'endereco', 'numero', 'complemento', 'referencia', 'avaliacao', 'outras_queixas'], 'safe'],
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
        $query = Ocorrencia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'cliente_id' => $this->cliente_id,
            'tipo' => $this->tipo,
            'motivo' => $this->motivo,
            'conduta_id' => $this->conduta_id,
        ]);

        $query->andFilterWhere(['like', 'numero_ocorrencia', $this->numero_ocorrencia])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'complemento', $this->complemento])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'avaliacao', $this->avaliacao]);

        return $dataProvider;
    }
}
