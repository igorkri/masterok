<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustomerRecord;

/**
 * CustomersSearch represents the model behind the search form of `app\models\CustomerRecord`.
 */
class CustomersSearch extends CustomerRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'akt', 'price', 'guarantee', 'material_price', 'repairs_price'], 'integer'],
            [['created_at', 'appliances', 'sn_model', 'repairs', 'phone', 'status', 'address', 'comment'], 'safe'],
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
        $query = CustomerRecord::find();

        // add conditions that should always apply here

//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
              'defaultOrder' => ['akt' => SORT_DESC],
            ],
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
            'akt' => $this->akt,
            'price' => $this->price,
            'guarantee' => $this->guarantee,
            'material_price' => $this->material_price,
            'repairs_price' => $this->repairs_price,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'appliances', $this->appliances])
            ->andFilterWhere(['like', 'sn_model', $this->sn_model])
            ->andFilterWhere(['like', 'repairs', $this->repairs])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
