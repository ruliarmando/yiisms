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
            [['Text', 'UDH', 'TextDecoded', 'ID', 'SenderID', 'SequencePosition', 'CreatorID'], 'required'],
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
            'SendingDateTime' => 'Sending Date Time',
            'DeliveryDateTime' => 'Delivery Date Time',
            'Text' => 'Text',
            'DestinationNumber' => 'Destination Number',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'SMSCNumber' => 'Smscnumber',
            'Class' => 'Class',
            'TextDecoded' => 'Text Decoded',
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
}
