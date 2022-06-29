<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="novelties">
    <div class="heading large">Новинки:</div>
    <?= view('partials/slider', ['data' => $novelties]) ?>
</div>

<div class="divider"></div>

<div class="popular">
    <div class="heading medium">Популярное:</div>
    <?= view('partials/titles-list', ['data' => $popular]) ?>
</div>

<?= $this->endSection(); ?>