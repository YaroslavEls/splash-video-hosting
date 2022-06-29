<?= $this->extend('layouts/user.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="pinned">
    <div class="heading small">Любимое:</div>
    <div class="list">
        <?php for($i = 0; $i < 5; $i++) : ?>
            <?= view('partials/title-item', ['num' => $i]) ?>
        <?php endfor ?>
    </div>
</div>

<div class="user_comps">
    <div class="comps_menu">
        <?php for($i = 0; $i < 6; $i++) : ?>
            <div class="item">Compilation</div>
        <?php endfor ?>
    </div>
    <div class="divider"></div>
    <div class="comps_content">
        <?= view('partials/compilation') ?>
    </div>
</div>

<div class="arrow-top" style="background-image: url('<?= base_url('assets/svg/arrow_top.svg') ?>');"></div>

<?= $this->endSection(); ?>