<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang di Yii SMS!</h1>

        <p class="lead">Solusi Praktis Untuk Komunikasi Menggunakan Layanan Short Message Service (SMS).</p>
    </div>
</div>

<?php $this->beginBlock('x_content'); ?>
<h2 class="page-header">Statistik</h2>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $outbox_count ?></h3>
                <p>Kotak Keluar</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-up-c"></i>
            </div>
            <a href="<?= Url::to(['outbox/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $inbox_count ?></h3>
                <p>Kotak Masuk</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-down-c"></i>
            </div>
            <a href="<?= Url::to(['inbox/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $pbk_count ?></h3>
                <p>Kontak</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-contacts"></i>
            </div>
            <a href="<?= Url::to(['pbk/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $pbk_groups_count ?></h3>
                <p>Group</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios7-pricetag"></i>
            </div>
            <a href="<?= Url::to(['pbk-groups/index']) ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<?php $this->endBlock(); ?>