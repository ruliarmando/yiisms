<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pbk_groups".
 *
 * @property string $Name
 * @property integer $ID
 */
class PbkGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pbk_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Name' => 'Name',
            'ID' => 'ID',
        ];
    }
    
    public function getContacts()
    {
        return $this->hasMany(Pbk::className(), ['GroupID' => 'ID']);
    }
}
