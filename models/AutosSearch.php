<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autos;

/**
 * AutosSearch represents the model behind the search form of `app\models\Autos`.
 */
class AutosSearch extends Autos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_auto', 'anio'], 'integer'],
            [['Portada', 'modelo', 'color', 'motor', 'tipo'], 'safe'],
            [['precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Autos::find();

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
            'id_auto' => $this->id_auto,
            'anio' => $this->anio,
            'precio' => $this->precio,
        ]);

        $query->andFilterWhere(['like', 'Portada', $this->Portada])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'motor', $this->motor])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
