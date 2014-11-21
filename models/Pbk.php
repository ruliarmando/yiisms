<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pbk".
 *
 * @property integer $ID
 * @property integer $GroupID
 * @property string $Name
 * @property string $Number
 */
class Pbk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pbk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GroupID'], 'integer'],
            [['Name', 'Number', 'GroupID'], 'required'],
            [['Name', 'Number'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'GroupID' => 'Group ID',
            'Name' => 'Name',
            'Number' => 'Number',
        ];
    }
    
    public function getGroup()
    {
        return $this->hasOne(PbkGroups::className(), ['ID' => 'GroupID']);
    }
    
    public function getGroupOptions()
    {
        $groups = PbkGroups::find()->all();
        
        return ArrayHelper::map($groups, 'ID', 'Name');
    }
}
