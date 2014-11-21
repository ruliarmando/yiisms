<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Outbox;

/**
 * OutboxSearch represents the model behind the search form about `app\models\Outbox`.
 */
class OutboxSearch extends Outbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'InsertIntoDB', 'SendingDateTime', 'SendBefore', 'SendAfter', 'Text', 'DestinationNumber', 'Coding', 'UDH', 'TextDecoded', 'MultiPart', 'SenderID', 'SendingTimeOut', 'DeliveryReport', 'CreatorID'], 'safe'],
            [['Class', 'ID', 'RelativeValidity'], 'integer'],
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
        $query = Outbox::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UpdatedInDB' => $this->UpdatedInDB,
            'InsertIntoDB' => $this->InsertIntoDB,
            'SendingDateTime' => $this->SendingDateTime,
            'SendBefore' => $this->SendBefore,
            'SendAfter' => $this->SendAfter,
            'Class' => $this->Class,
            'ID' => $this->ID,
            'RelativeValidity' => $this->RelativeValidity,
            'SendingTimeOut' => $this->SendingTimeOut,
        ]);

        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'DestinationNumber', $this->DestinationNumber])
            ->andFilterWhere(['like', 'Coding', $this->Coding])
            ->andFilterWhere(['like', 'UDH', $this->UDH])
            ->andFilterWhere(['like', 'TextDecoded', $this->TextDecoded])
            ->andFilterWhere(['like', 'MultiPart', $this->MultiPart])
            ->andFilterWhere(['like', 'SenderID', $this->SenderID])
            ->andFilterWhere(['like', 'DeliveryReport', $this->DeliveryReport])
            ->andFilterWhere(['like', 'CreatorID', $this->CreatorID]);

        return $dataProvider;
    }
}
