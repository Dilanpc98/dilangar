<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ventas;

/**
 * VentasSearch represents the model behind the search form of `app\models\Ventas`.
 */
class VentasSearch extends Ventas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_venta', 'fk_id_auto', 'fk_id_cliente', 'cantidad'], 'integer'],
            [['fecha_venta'], 'safe'],
            [['total'], 'number'],
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
        $query = Ventas::find();

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
            'id_venta' => $this->id_venta,
            'fk_id_auto' => $this->fk_id_auto,
            'fk_id_cliente' => $this->fk_id_cliente,
            'fecha_venta' => $this->fecha_venta,
            'cantidad' => $this->cantidad,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
