<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <h1 style="margin-bottom:35px;"><?= $heading ?></h1>

        <?php if (!$data) : ?>
            <h2>Nothing found :(</h2>
        <?php endif ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?php for($i = 0; $i < count($data); $i++) : ?>
                <?= view('partials/card', ['num' => $i]); ?>
            <?php endfor ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>