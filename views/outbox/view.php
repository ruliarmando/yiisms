<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Outbox */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Outboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbox-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
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
            'SendBefore',
            'SendAfter',
            'Text:ntext',
            'DestinationNumber',
            'Coding',
            'UDH:ntext',
            'Class',
            'TextDecoded:ntext',
            'ID',
            'MultiPart',
            'RelativeValidity',
            'SenderID',
            'SendingTimeOut',
            'DeliveryReport',
            'CreatorID:ntext',
        ],
    ]) ?>

</div>
