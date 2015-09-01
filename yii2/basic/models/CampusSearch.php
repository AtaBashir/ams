<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\campus;

/**
 * CampusSearch represents the model behind the search form about `app\models\campus`.
 */
class CampusSearch extends campus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cmps_id'], 'integer'],
            [['cmps_desc', 'cmps_address'], 'safe'],
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
        $query = campus::find();

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
            'cmps_id' => $this->cmps_id,
        ]);

        $query->andFilterWhere(['like', 'cmps_desc', $this->cmps_desc])
            ->andFilterWhere(['like', 'cmps_address', $this->cmps_address]);

        return $dataProvider;
    }
}
