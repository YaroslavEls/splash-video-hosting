<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="content">
    <?= view('partials/menu_main') ?>

    <div class="novelties">
        <div class="heading medium">Результаты: <?= $heading ?></div>

        <?php if (!$data) : ?>
            <h2>Ничего не найдено :(</h2>
        <?php endif ?>

        <div class="list">
            <?php for($i = 0; $i < count($data); $i++) : ?>
                <?= view('partials/seria_item', ['num' => $i]) ?>
            <?php endfor ?>
        </div>
    </div>

    <?= view('partials/pagination') ?>
</div>

<?= $this->endSection(); ?>