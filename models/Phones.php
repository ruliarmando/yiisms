<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phones".
 *
 * @property string $ID
 * @property string $UpdatedInDB
 * @property string $InsertIntoDB
 * @property string $TimeOut
 * @property string $Send
 * @property string $Receive
 * @property string $IMEI
 * @property string $Client
 * @property integer $Battery
 * @property integer $Signal
 * @property integer $Sent
 * @property integer $Received
 */
class Phones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'IMEI', 'Client'], 'required'],
            [['ID', 'Send', 'Receive', 'Client'], 'string'],
            [['UpdatedInDB', 'InsertIntoDB', 'TimeOut'], 'safe'],
            [['Battery', 'Signal', 'Sent', 'Received'], 'integer'],
            [['IMEI'], 'string', 'max' => 35]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UpdatedInDB' => 'Updated In Db',
            'InsertIntoDB' => 'Insert Into Db',
            'TimeOut' => 'Time Out',
            'Send' => 'Send',
            'Receive' => 'Receive',
            'IMEI' => 'Imei',
            'Client' => 'Client',
            'Battery' => 'Battery',
            'Signal' => 'Signal',
            'Sent' => 'Sent',
            'Received' => 'Received',
        ];
    }
}
