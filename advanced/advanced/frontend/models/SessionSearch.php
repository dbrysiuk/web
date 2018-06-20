<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Session;

/**
 * SessionSearch represents the model behind the search form of `frontend\models\Session`.
 */
class SessionSearch extends Session
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'name'], 'safe'],
            [['admin_id', 'equations', 'inequalities', 'functions', 'linearEquations', 'polynomial', 'quadraticEquations'], 'integer'],
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
        $query = Session::find();

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
            'admin_id' => $this->admin_id,
            'equations' => $this->equations,
            'inequalities' => $this->inequalities,
            'functions' => $this->functions,
            'linearEquations' => $this->linearEquations,
            'polynomial' => $this->polynomial,
            'quadraticEquations' => $this->quadraticEquations,
        ]);

        $query->andFilterWhere(['like', 'token', $this->token])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
