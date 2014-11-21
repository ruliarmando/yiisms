<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inbox;

/**
 * InboxSearch represents the model behind the search form about `app\models\Inbox`.
 */
class InboxSearch extends Inbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'ReceivingDateTime', 'Text', 'SenderNumber', 'Coding', 'UDH', 'SMSCNumber', 'TextDecoded', 'RecipientID', 'Processed'], 'safe'],
            [['Class', 'ID'], 'integer'],
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
        $query = Inbox::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'UpdatedInDB' => $this->UpdatedInDB,
            'ReceivingDateTime' => $this->ReceivingDateTime,
            'Class' => $this->Class,
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'SenderNumber', $this->SenderNumber])
            ->andFilterWhere(['like', 'Coding', $this->Coding])
            ->andFilterWhere(['like', 'UDH', $this->UDH])
            ->andFilterWhere(['like', 'SMSCNumber', $this->SMSCNumber])
            ->andFilterWhere(['like', 'TextDecoded', $this->TextDecoded])
            ->andFilterWhere(['like', 'RecipientID', $this->RecipientID])
            ->andFilterWhere(['like', 'Processed', $this->Processed]);

        return $dataProvider;
    }
}
