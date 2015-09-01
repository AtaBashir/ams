<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form about `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_id'], 'integer'],
        	[['st_active'], 'boolean'],
            [['st_fname', 'st_lname', 'st_address', 'st_postcode', 'st_mobile', 'st_phone', 'st_email', 'st_disp_id'], 'safe'],
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
        $query = Student::find();

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
            'st_id' => $this->st_id,
            'st_active' => $this->st_active,
        ]);

        $query->andFilterWhere(['like', 'st_fname', $this->st_fname])
            ->andFilterWhere(['like', 'st_lname', $this->st_lname])
            ->andFilterWhere(['like', 'st_address', $this->st_address])
            ->andFilterWhere(['like', 'st_postcode', $this->st_postcode])
            ->andFilterWhere(['like', 'st_mobile', $this->st_mobile])
            ->andFilterWhere(['like', 'st_phone', $this->st_phone])
            ->andFilterWhere(['like', 'st_email', $this->st_email])
            ->andFilterWhere(['like', 'st_disp_id', $this->st_disp_id]);

        return $dataProvider;
    }
}
