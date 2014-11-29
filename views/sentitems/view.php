<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sentitems */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sentitems-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'SequencePosition' => $model->SequencePosition], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'SequencePosition' => $model->SequencePosition], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'UpdatedInDB',
            'InsertIntoDB',
            'SendingDateTime',
            'DeliveryDateTime',
            'Text:ntext',
            'DestinationNumber',
            'Coding',
            'UDH:ntext',
            'SMSCNumber',
            'Class',
            'TextDecoded:ntext',
            'ID',
            'SenderID',
            'SequencePosition',
            'Status',
            'StatusError',
            'TPMR',
            'RelativeValidity',
            'CreatorID:ntext',
        ],
    ]) ?>

</div>
