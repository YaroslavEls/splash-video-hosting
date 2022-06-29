<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

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

<?= $this->endSection(); ?>