<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form about `app\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crs_id',  'crs_duration', 'crs_days', 'crs_active'], 'integer'],
            [['crs_desc', 'crs_drtn_type','crs_ct_id', 'crs_disp_id'], 'safe'],
            [['crs_wkly_hrs'], 'number'],
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
        $query = Course::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('crsCt');
        
        $query->andFilterWhere([
            'crs_id' => $this->crs_id,
        //    'crs_ct_id' => $this->crs_ct_id,
            'crs_duration' => $this->crs_duration,
            'crs_days' => $this->crs_days,
            'crs_wkly_hrs' => $this->crs_wkly_hrs,
            'crs_active' => $this->crs_active,
        ]);

        $query->andFilterWhere(['like', 'crs_desc', $this->crs_desc])
            ->andFilterWhere(['like', 'crs_drtn_type', $this->crs_drtn_type])
            ->andFilterWhere(['like', 'crs_disp_id', $this->crs_disp_id])
        	->andFilterWhere(['like', 'course_type.ct_desc',$this->crs_ct_id]);

        return $dataProvider;
    }
}
