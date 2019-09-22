<?php

namespace app\models\shop\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\shop\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\shop\models\Product`.
 */
class ProductSearch extends Product
{
    
    public $tag_id;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'tag_id', 'price', 'active'], 'integer'],
            [['name', 'content'], 'safe'],
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
//        $query = Product::find()->with(['category']);
        $query = Product::find()->with(['category', 'tags'])->joinWith(['productTags'], false)->groupBy('id');
//          $query = Product::find()->joinWith('category')->with('tags')->joinWith(['productTags'], false)->groupBy('id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'sort' => [
//                'defaultOrder' => ['id' => SORT_DESC],
//                'attributes' => [
//                    'id',
//                    'name',
//                    'price',
//                    'active',
//                    'category_id' => [
//                        'asc' => ['{{%category}}.name' => SORT_ASC],
//                        'desc' => ['{{%category}}.name' => SORT_DESC],
//                    ],
//                ]
//            ]
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'active' => $this->active,
            '{{%product_tag}}.tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
