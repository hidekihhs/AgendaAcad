<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disciplina;

/**
 * DisciplinaSearch represents the model behind the search form about `app\models\Disciplina`.
 */
class DisciplinaSearch extends Disciplina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDisciplina', 'id_professor'], 'integer'],
            [['nome_disciplina', 'datainicio', 'datafim', 'id_monitor'], 'safe'],
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
        $query = Disciplina::find();

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

        $query->joinWith('idMonitor');
        // grid filtering conditions
        $query->andFilterWhere([
            'idDisciplina' => $this->idDisciplina,
            'id_professor' => $this->id_professor,
            'id_monitor' => $this->id_monitor,
            'datainicio' => $this->datainicio,
            'datafim' => $this->datafim,
        ]);

        $query->andFilterWhere(['like', 'nome_disciplina', $this->nome_disciplina]);
        $query->andFilterWhere(['like', 'usuario.nome', $this->id_monitor
        ]);

        return $dataProvider;
    }
}
