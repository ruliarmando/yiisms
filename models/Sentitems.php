<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sentitems".
 *
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $SendingDateTime
 * @property string $DeliveryDateTime
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property integer $Class
 * @property string $TextDecoded
 * @property string $ID
 * @property string $SenderID
 * @property integer $SequencePosition
 * @property string $Status
 * @property integer $StatusError
 * @property integer $TPMR
 * @property integer $RelativeValidity
 * @property string $CreatorID
 */
class Sentitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sentitems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'InsertIntoDB', 'SendingDateTime', 'DeliveryDateTime'], 'safe'],
            [['Text', 'UDH', 'TextDecoded'], 'required'],
            [['Text', 'Coding', 'UDH', 'TextDecoded', 'Status', 'CreatorID'], 'string'],
            [['Class', 'ID', 'SequencePosition', 'StatusError', 'TPMR', 'RelativeValidity'], 'integer'],
            [['DestinationNumber', 'SMSCNumber'], 'string', 'max' => 20],
            [['SenderID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UpdatedInDB' => 'Updated In Db',
            'InsertIntoDB' => 'Insert Into Db',
            'SendingDateTime' => 'Waktu Pengiriman',
            'DeliveryDateTime' => 'Waktu Terkirim',
            'Text' => 'Text',
            'DestinationNumber' => 'Nomor Tujuan',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'SMSCNumber' => 'SMSC',
            'Class' => 'Class',
            'TextDecoded' => 'Isi Pesan',
            'ID' => 'ID',
            'SenderID' => 'Sender ID',
            'SequencePosition' => 'Sequence Position',
            'Status' => 'Status',
            'StatusError' => 'Status Error',
            'TPMR' => 'Tpmr',
            'RelativeValidity' => 'Relative Validity',
            'CreatorID' => 'Creator ID',
        ];
    }
    
    public function getShortText()
    {
        if (strlen($this->TextDecoded) > 40) {
            return substr($this->TextDecoded, 0, 40).'...';
        }
        
        return $this->TextDecoded;
    }
    
    public function getRelativeSendingTime()
    {
        return Yii::$app->formatter->asRelativeTime(new \DateTime($this->SendingDateTime));
    }
    
    public function getPbk()
    {
        return $this->hasOne(Pbk::className(), ['Number' => 'DestinationNumber']);
    }
}
