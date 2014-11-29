<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "outbox".
 *
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $SendingDateTime
 * @property string $SendBefore
 * @property string $SendAfter
 * @property string $Text
 * @property string $DestinationNumber
 * @property string $Coding
 * @property string $UDH
 * @property integer $Class
 * @property string $TextDecoded
 * @property string $ID
 * @property string $MultiPart
 * @property integer $RelativeValidity
 * @property string $SenderID
 * @property string $SendingTimeOut
 * @property string $DeliveryReport
 * @property string $CreatorID
 */
class Outbox extends \yii\db\ActiveRecord
{
    const PHONE_ID = 'wavecom';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'InsertIntoDB', 'SendingDateTime', 'SendBefore', 'SendAfter', 'SendingTimeOut'], 'safe'],
            [['Text', 'TextDecoded'], 'string'],
            [['TextDecoded', 'DestinationNumber'], 'required'],
            ['CreatorID', 'default', 'value' => self::PHONE_ID],
            ['Coding', 'default', 'value' => 'Default_No_Compression'],
            [['DestinationNumber'], 'string', 'max' => 20],
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
            'SendBefore' => 'Send Before',
            'SendAfter' => 'Send After',
            'Text' => 'Text',
            'DestinationNumber' => 'Nomor Tujuan',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'Class' => 'Class',
            'TextDecoded' => 'Isi Pesan',
            'ID' => 'ID',
            'MultiPart' => 'Multi Part',
            'RelativeValidity' => 'Relative Validity',
            'SenderID' => 'Sender ID',
            'SendingTimeOut' => 'Sending Time Out',
            'DeliveryReport' => 'Delivery Report',
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
