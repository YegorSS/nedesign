<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pages;

/**
 * SearchPages represents the model behind the search form about `common\models\Pages`.
 */
class SearchPages extends Pages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rate', 'voites', 'active'], 'integer'],
            [['title', 'header_meny', 'h_1', 'h_2', 'keywords', 'description', 'alias', 'text'], 'safe'],
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
        $query = Pages::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'rate' => $this->rate,
            'voites' => $this->voites,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'header_meny', $this->header_meny])
            ->andFilterWhere(['like', 'h_1', $this->h_1])
            ->andFilterWhere(['like', 'h_2', $this->h_2])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
