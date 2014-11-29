<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sentitems;

/**
 * SentitemsSearch represents the model behind the search form about `app\models\Sentitems`.
 */
class SentitemsSearch extends Sentitems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'InsertIntoDB', 'SendingDateTime', 'DeliveryDateTime', 'Text', 'DestinationNumber', 'Coding', 'UDH', 'SMSCNumber', 'TextDecoded', 'SenderID', 'Status', 'CreatorID'], 'safe'],
            [['Class', 'ID', 'SequencePosition', 'StatusError', 'TPMR', 'RelativeValidity'], 'integer'],
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
        $query = Sentitems::find();

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
            'DeliveryDateTime' => $this->DeliveryDateTime,
            'Class' => $this->Class,
            'ID' => $this->ID,
            'SequencePosition' => $this->SequencePosition,
            'StatusError' => $this->StatusError,
            'TPMR' => $this->TPMR,
            'RelativeValidity' => $this->RelativeValidity,
        ]);

        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'DestinationNumber', $this->DestinationNumber])
            ->andFilterWhere(['like', 'Coding', $this->Coding])
            ->andFilterWhere(['like', 'UDH', $this->UDH])
            ->andFilterWhere(['like', 'SMSCNumber', $this->SMSCNumber])
            ->andFilterWhere(['like', 'TextDecoded', $this->TextDecoded])
            ->andFilterWhere(['like', 'SenderID', $this->SenderID])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'CreatorID', $this->CreatorID]);

        return $dataProvider;
    }
}
