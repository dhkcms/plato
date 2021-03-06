<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CallNumberRules;

/**
 * CallNumberRulesSearch represents the model behind the search form of `common\models\CallNumberRules`.
 */
class CallNumberRulesSearch extends CallNumberRules
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'library_id', 'user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['title', 'collection_place_ids', 'circulation_type_ids'], 'safe'],
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
        $query = CallNumberRules::find();

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
            'library_id' => $this->library_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'collection_place_ids', $this->collection_place_ids])
            ->andFilterWhere(['like', 'circulation_type_ids', $this->circulation_type_ids]);

        return $dataProvider;
    }
}
