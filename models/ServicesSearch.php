<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Services;

/**
* ServicesSearch represents the model behind the search form of `app\models\Services`.
*/
class ServicesSearch extends Services
{
/**
* {@inheritdoc}
*/
public function rules()
{
return [
[['id', 'id_service'], 'integer'],
            [['meta_key', 'meta_desk', 'title', 'title_slide',  'img_slide', 'link', 'name', 'title_page', 'text'], 'safe'],
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
$query = Services::find();

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
            'id_service' => $this->id_service,
        ]);

        $query->andFilterWhere(['like', 'meta_key', $this->meta_key])
            ->andFilterWhere(['like', 'meta_desk', $this->meta_desk])
            ->andFilterWhere(['like', 'title_slide', $this->title_slide])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img_slide', $this->img_slide])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title_page', $this->title_page])
            ->andFilterWhere(['like', 'text', $this->text]);

return $dataProvider;
}
}
