<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServiciosPostventa;

/**
 * ServiciosPostventaSearch represents the model behind the search form of `app\models\ServiciosPostventa`.
 */
class ServiciosPostventaSearch extends ServiciosPostventa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_servicio', 'fk_id_auto', 'fk_id_cliente', 'fk_id_concesionario'], 'integer'],
            [['tipo_servicio', 'fecha_servicio'], 'safe'],
            [['costo'], 'number'],
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
        $query = ServiciosPostventa::find();

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
            'id_servicio' => $this->id_servicio,
            'fk_id_auto' => $this->fk_id_auto,
            'fk_id_cliente' => $this->fk_id_cliente,
            'fk_id_concesionario' => $this->fk_id_concesionario,
            'fecha_servicio' => $this->fecha_servicio,
            'costo' => $this->costo,
        ]);

        $query->andFilterWhere(['like', 'tipo_servicio', $this->tipo_servicio]);

        return $dataProvider;
    }
}
