<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form about `app\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tchr_id', 'tchr_active'], 'integer'],
            [['tchr_fname', 'tchr_lname', 'tchr_address', 'tchr_postcode', 'tchr_mobile', 'tchr_phone', 'tchr_email',  'tchr_disp_id'], 'safe'],
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
        $query = Teacher::find();

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
            'tchr_id' => $this->tchr_id,
            'tchr_active' => $this->tchr_active,
        ]);

        $query->andFilterWhere(['like', 'tchr_fname', $this->tchr_fname])
            ->andFilterWhere(['like', 'tchr_lname', $this->tchr_lname])
            ->andFilterWhere(['like', 'tchr_address', $this->tchr_address])
            ->andFilterWhere(['like', 'tchr_postcode', $this->tchr_postcode])
            ->andFilterWhere(['like', 'tchr_mobile', $this->tchr_mobile])
            ->andFilterWhere(['like', 'tchr_phone', $this->tchr_phone])
            ->andFilterWhere(['like', 'tchr_email', $this->tchr_email])
            ->andFilterWhere(['like', 'tchr_disp_id', $this->tchr_disp_id]);

        return $dataProvider;
    }
}
