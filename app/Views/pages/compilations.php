<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="content">
    <?= view('partials/menu_main') ?>

    <div class="comp_novelties">
        <div class="heading medium" style="margin-bottom:30px">Новое:</div>
        <?= view('partials/compilation') ?>
    </div>

    <div class="comp_popular">
        <div class="heading medium" style="margin-bottom:30px">Популярное:</div>
        <?php for($i = 0; $i < 3; $i++) : ?>
            <?= view('partials/compilation', ['num' => $i]) ?>
        <?php endfor ?>
    </div>

    <?= view('partials/pagination') ?>
</div>

<?= $this->endSection(); ?>