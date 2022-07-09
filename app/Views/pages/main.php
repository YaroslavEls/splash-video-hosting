<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="novelties">
    <a href="/filters/new" class="heading large">Новинки:</a>
    <?= view('partials/slider', ['data' => $novelties]) ?>
</div>

<div class="divider"></div>

<div class="popular">
    <a href="/filters/popular" class="heading medium">Популярное:</a>
    <?= view('partials/titles-list', ['data' => $popular]) ?>
</div>

<?= $this->endSection(); ?>