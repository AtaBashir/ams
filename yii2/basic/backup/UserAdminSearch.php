<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\user;

/**
 * UserSearch represents the model behind the search form about `app\models\user`.
 */
class UserAdminSearch extends userAdmin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usr_id', 'usr_name', 'usr_pass', 'usr_email', 'usr_secq', 'usr_seca'], 'safe'],
            [['usr_is_teacher', 'usr_is_admin', 'usr_is_su', 'usr_type_id', 'usr_active'], 'integer'],
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
        $query = userAdmin::find();

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
            'usr_is_teacher' => $this->usr_is_teacher,
            'usr_is_admin' => $this->usr_is_admin,
            'usr_is_su' => $this->usr_is_su,
            'usr_type_id' => $this->usr_type_id,
            'usr_active' => $this->usr_active,
        ]);

        $query->andFilterWhere(['like', 'usr_id', $this->usr_id])
            ->andFilterWhere(['like', 'usr_name', $this->usr_name])
            ->andFilterWhere(['like', 'usr_pass', $this->usr_pass])
            ->andFilterWhere(['like', 'usr_email', $this->usr_email])
            ->andFilterWhere(['like', 'usr_secq', $this->usr_secq])
            ->andFilterWhere(['like', 'usr_seca', $this->usr_seca]);

        return $dataProvider;
    }
}
