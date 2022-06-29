<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="popular">
    <div class="heading medium">Результаты: <?= $heading ?></div>

    <?php if (!$data) : ?>
        <h2>Ничего не найдено :(</h2>
    <?php endif ?>

    <?= view('partials/titles-list', ['data' => $data]) ?>
</div>

<?= $this->endSection(); ?>