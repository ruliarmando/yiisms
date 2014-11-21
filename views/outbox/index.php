<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kotak Keluar';
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Kotak Keluar';
?>
<div class="outbox-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DestinationNumber',
            'TextDecoded:ntext',
            'SendingDateTime',
            // 'UpdatedInDB',
            // 'InsertIntoDB',
            // 'SendBefore',
            // 'SendAfter',
            // 'Text:ntext',
            // 'Coding',
            // 'UDH:ntext',
            // 'Class',
            // 'ID',
            // 'MultiPart',
            // 'RelativeValidity',
            // 'SenderID',
            // 'SendingTimeOut',
            // 'DeliveryReport',
            // 'CreatorID:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
