<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserAdmin;

/**
 * UserAdminSearch represents the model behind the search form about `app\models\UserAdmin`.
 */
class UserAdminSearch extends UserAdmin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usr_id', 'usr_name', 'usr_pass', 'usr_email'], 'safe'],
            [['id','usr_is_teacher', 'usr_is_admin', 'usr_is_su', 'usr_type_id', 'usr_active'], 'integer'],
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
        $query = UserAdmin::find();

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
            'usr_is_teacher' => $this->usr_is_teacher,
            'usr_is_admin' => $this->usr_is_admin,
            'usr_is_su' => $this->usr_is_su,
            'usr_type_id' => $this->usr_type_id,
            'usr_active' => $this->usr_active,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'usr_id', $this->usr_id])
            ->andFilterWhere(['like', 'usr_name', $this->usr_name])
            ->andFilterWhere(['like', 'usr_pass', $this->usr_pass])
            ->andFilterWhere(['like', 'usr_email', $this->usr_email]);

        return $dataProvider;
    }
}
