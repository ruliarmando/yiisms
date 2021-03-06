<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbox".
 *
 * @property string $UpdatedInDB
 * @property string $ReceivingDateTime
 * @property string $Text
 * @property string $SenderNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property integer $Class
 * @property string $TextDecoded
 * @property string $ID
 * @property string $RecipientID
 * @property string $Processed
 */
class Inbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'ReceivingDateTime'], 'safe'],
            [['Text', 'Coding', 'UDH', 'TextDecoded', 'RecipientID', 'Processed'], 'string'],
            [['Class'], 'integer'],
            [['SenderNumber', 'SMSCNumber'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UpdatedInDB' => 'Updated In Db',
            'ReceivingDateTime' => 'Waktu Pengiriman',
            'Text' => 'Text',
            'SenderNumber' => 'Nomor Pengirim',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'SMSCNumber' => 'Smscnumber',
            'Class' => 'Class',
            'TextDecoded' => 'Isi Pesan',
            'ID' => 'ID',
            'RecipientID' => 'Recipient ID',
            'Processed' => 'Processed',
        ];
    }
    
    public function getRelativeReceivingTime()
    {
        return Yii::$app->formatter->asRelativeTime(new \DateTime($this->ReceivingDateTime));
    }
    
    public function getPbk()
    {
        //return $this->hasOne(Pbk::className(), ['Number' => 'SenderNumber']);
        $number = $this->SenderNumber;
        if (strpos($number, '+') !== false) {
            $number = str_replace('+62', '0', $number);
        }
        $pbk = Pbk::find(['Number' => $number])->one();
        if ($pbk !== null) {
            return $pbk->Name;
        }
        return '(not set)';
    }
    
    public static function find()
    {
        return new InboxQuery(get_called_class());
    }
}
