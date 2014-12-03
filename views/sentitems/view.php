<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sentitems */

$this->title = $model->DestinationNumber;
$this->params['breadcrumbs'][] = ['label' => 'Pesan Terkirim', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Pesan Terkirim';
?>
<div class="sentitems-view">

    <p>
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
            'SendingDateTime',
            'DeliveryDateTime',
            'DestinationNumber',
            'SMSCNumber',
            'TextDecoded:ntext',
            'ID',
        ],
    ]) ?>

</div>
