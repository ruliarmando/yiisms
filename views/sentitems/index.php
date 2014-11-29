<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SentitemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesan Terkirim';
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Pesan Terkirim';
?>
<div class="sentitems-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Nama',
                'value' => 'pbk.Name'
            ],
            'DestinationNumber',
            [
                'attribute' => 'TextDecoded',
                'value' => function ($model, $key, $index, $column) {
                    return $model->shortText;
                }
            ],
            [
                'attribute' => 'SendingDateTime',
                'value' => function ($model, $key, $index, $column) {
                    return $model->relativeSendingTime;
                }
            ],
            // 'DestinationNumber',
            // 'Coding',
            // 'UDH:ntext',
            // 'SMSCNumber',
            // 'Class',
            // 'TextDecoded:ntext',
            // 'ID',
            // 'SenderID',
            // 'SequencePosition',
            // 'Status',
            // 'StatusError',
            // 'TPMR',
            // 'RelativeValidity',
            // 'CreatorID:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
