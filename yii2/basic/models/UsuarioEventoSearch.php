<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioEvento;

/**
 * UsuarioEventoSearch represents the model behind the search form about `app\models\UsuarioEvento`.
 */
class UsuarioEventoSearch extends UsuarioEvento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario_evento', 'id_evento', 'id_usuario'], 'integer'],
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
        $query = UsuarioEvento::find();

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
            'id_usuario_evento' => $this->id_usuario_evento,
            'id_evento' => $this->id_evento,
            'id_usuario' => $this->id_usuario,
        ]);

        return $dataProvider;
    }
}
