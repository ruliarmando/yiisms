<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

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
        <?= Html::a('Kelola Group', ['pbk-groups/index'], ['class' => 'btn btn-info']) ?>
    </p>
    
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'Name:ntext',
            'Number:ntext',
            [
                'header' => 'Group',
                'value' => 'group.Name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
