<?php

namespace app\components;

use Yii;
use yii\db\Query;

class SettingsHelper
{
    public static function getFilePath($type)
    {
        return Yii::getAlias("@app/config/spam_{$type}.txt");
    }
    
	public static function enabled($name)
    {
        $value = (new Query())
            ->select($name.'_enabled')
            ->from('settings')
            ->where('id = 1')
            ->limit(1)
            ->scalar();
            
        return $value;
    }
    
    public static function getSpamList($type, $asString = false)
    {
        $list = file(self::getfilePath($type));
        
        if ($asString) {
        
            array_walk($list, function (&$item) {
                $item = rtrim($item);
            });
            
            return implode(' ', $list);
        }
        
        return $list;
    }
    
    public static function updateSpamList($type, $value)
    {
        $file = fopen(self::getFilePath($type), 'w');
        
        $value = explode(' ', $value);
        
        $value = implode("\n", $value);
        
        return fwrite($file, $value);
    }
    
    public static function changeSettings($name, $value)
    {
        return Yii::$app->db->createCommand("UPDATE settings SET {$name}_enabled = {$value} WHERE id = 1")->execute();
    }
}
