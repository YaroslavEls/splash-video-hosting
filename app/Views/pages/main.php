<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="content">
    <?= view('partials/menu_main') ?>

    <div class="novelties">
        <div class="heading large">Новинки:</div>
        <div class="list">
            <?php for($i = 0; $i < 4; $i++) : ?>
                <?= view('partials/seria_item', ['num' => $i]) ?>
            <?php endfor ?>
        </div>
    </div>

    <div class="divider"></div>

    <div class="popular">
        <div class="heading medium">Популярное:</div>
        <div class="list">
            <?php for($i = 0+4; $i < count($data); $i++) : ?>
                <?= view('partials/seria_item', ['num' => $i]) ?>
            <?php endfor ?>
        </div>
    </div>

    <?= view('partials/pagination') ?>
</div>

<?= $this->endSection(); ?>