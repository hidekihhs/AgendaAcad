<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Evento;

/**
 * EventoSearch represents the model behind the search form about `app\models\Evento`.
 */
class EventoSearch extends Evento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evento',  'id_usuario'], 'integer'],
            [['data', 'hora', 'descricao', 'nome','id_disciplina', 'tipo'], 'safe'],
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
        $query = Evento::find();

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

        $query->joinWith('idDisciplina');
        // grid filtering conditions
        $query->andFilterWhere([
            'id_evento' => $this->id_evento,
            'data' => $this->data,
            'hora' => $this->hora,
            'id_disciplina' => $this->id_disciplina,
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        $query->andFilterWhere(['like', 'disciplina.nome_disciplina', $this->id_disciplina
        ]);

        return $dataProvider;
    }
}
