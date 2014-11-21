<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PbkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku Telepon';
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Buku Telepon';
?>
<div class="pbk-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Kontak', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'Name:ntext',
            'Number:ntext',
            'group.Name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
