<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inbox */

$this->title = $model->SenderNumber;
$this->params['breadcrumbs'][] = ['label' => 'Kotak Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Kotak Masuk';
?>
<div class="inbox-view">

    <p>
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
            'ReceivingDateTime',
            'SenderNumber',
            'TextDecoded:ntext',
            'ID',
        ],
    ]) ?>

</div>
