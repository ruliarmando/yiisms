<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

class InboxQuery extends ActiveQuery
{
	public function unread()
    {
        $this->andWhere(['Processed' => 'false']);
        $this->orderBy('ReceivingDateTime');
        
        return $this;
    }
}
