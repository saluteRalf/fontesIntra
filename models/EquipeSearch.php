<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipe;

/**
 * EquipeSearch represents the model behind the search form about `app\models\Equipe`.
 */
class EquipeSearch extends Equipe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'motorista_id', 'tecnico_enfermeiro_id', 'enfermeiro_id', 'medico_id', 'em_atendimento'], 'integer'],
            [['nome', 'descricao', 'classificacao_id', 'localizacao_atual'], 'safe'],
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
        $query = Equipe::find();

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
            'motorista_id' => $this->motorista_id,
            'tecnico_enfermeiro_id' => $this->tecnico_enfermeiro_id,
            'enfermeiro_id' => $this->enfermeiro_id,
            'medico_id' => $this->medico_id,
            'em_atendimento' => $this->em_atendimento,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'classificacao_id', $this->classificacao_id])
            ->andFilterWhere(['like', 'localizacao_atual', $this->localizacao_atual]);

        return $dataProvider;
    }
}
