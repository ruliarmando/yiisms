<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * SmsSendForm is the model behind the sms-send form.
 */
class SendSmsForm extends Model
{
    const SEND_OPT_SINGLE = 1;
    const SEND_OPT_MULTI = 2;
    const SEND_OPT_GROUP = 3;
    
    const TIME_OPT_NOW = 0;
    const TIME_OPT_DATETIME = 10;
    const TIME_OPT_DELAY = 20;
    
    public $sendingOptions;
    public $timeOptions;
    public $sendingDateTime;
    public $sendingTime;
    public $number;
    public $group;
    public $text;
    
    public function attributeLabels()
    {
        return [
            'number' => 'Kontak',
            'text' => 'Isi Pesan',
            'sendingOptions' => 'Pilihan Pengiriman',
            'timeOptions' => 'Waktu Pengiriman',
            'sendingDateTime' => 'Tanggal dan Jam',
            'sendingTime' => 'Jam dan Menit',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['number', 'text'], 'required'],
            ['sendingOptions', 'in', 'range' => array_keys($this->getSendingOptions())],
            ['timeOptions', 'in', 'range' => array_keys($this->getTimeOptions())],
            ['sendingDateTime', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'],
            ['sendingTime', 'date', 'format' => 'HH:mm']
        ];
    }

    public function send()
    {
        $sendMany = false;
        
        if ($this->sendingOptions == self::SEND_OPT_MULTI) {
            $contacts = Pbk::findAll(explode(',', $this->number));
            $sendMany = true;
        }
        
        if ($this->sendingOptions == self::SEND_OPT_GROUP) {
            $contacts = Pbk::find()->where(['GroupID' => $this->number])->all();
            $sendMany = true;
        }
        
        if ($this->timeOptions == self::TIME_OPT_NOW) {
            $time = new Expression('NOW()');
        } elseif ($this->timeOptions == self::TIME_OPT_DATETIME) {
            $time = $this->sendingDateTime;
        } else {
            $timeParts = explode(':', $this->sendingTime);
            $hours = intval($timeParts[0]);
            $minutes = intval($timeParts[1]);
            $now = new \DateTime();
            $now->add(new \DateInterval("PT{$hours}H{$minutes}M"));
            $time = $now->format('Y-m-d H:i:s');
        }
        
        if ($sendMany) {
            foreach ($contacts as $contact) {
                $this->insertIntoOutbox($contact->Number, $this->text, $time);
            }
        } else {
            $this->insertIntoOutbox(trim($this->number), $this->text, $time);
        }
    }
    
    private function insertIntoOutbox($number, $text, $time)
    {
        $outbox = new Outbox();
        $outbox->DestinationNumber = $number;
        $outbox->TextDecoded = $text;
        $outbox->SendingDateTime = $time;
        $outbox->save();
    }
    
    public function getSendingOptions()
    {
        return [
            self::SEND_OPT_SINGLE => 'Masukkan Secara Manual',
            self::SEND_OPT_MULTI => 'Daftar Kontak',
            self::SEND_OPT_GROUP => 'Group',
        ];
    }
    
    public function getTimeOptions()
    {
        return [
            self::TIME_OPT_NOW => 'Sekarang Juga',
            self::TIME_OPT_DATETIME => 'Pada Tanggal/Waktu',
            self::TIME_OPT_DELAY => 'Setelah Penundaan',
        ];
    }
    
    public function getGroupOptions()
    {
        $groups = PbkGroups::find()->all();
        
        return ArrayHelper::map($groups, 'ID', 'Name');
    }
}
