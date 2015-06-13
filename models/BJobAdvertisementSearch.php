<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BJobAdvertisement;

/**
 * BJobAdvertisementSearch represents the model behind the search form about `app\models\BJobAdvertisement`.
 */
class BJobAdvertisementSearch extends BJobAdvertisement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'orientation_id'], 'integer'],
            [['name', 'created_at', 'activated_at', 'email', 'status'], 'safe'],
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
        $query = BJobAdvertisement::find();

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
            'created_at' => $this->created_at,
            'activated_at' => $this->activated_at,
            'orientation_id' => $this->orientation_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
