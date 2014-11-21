<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pbk;

/**
 * PbkSearch represents the model behind the search form about `app\models\Pbk`.
 */
class PbkSearch extends Pbk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GroupID'], 'integer'],
            [['Name', 'Number'], 'safe'],
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
        $query = Pbk::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'GroupID' => $this->GroupID,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Number', $this->Number]);

        return $dataProvider;
    }
}
