<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row g-3" style="justify-content:center">
            <ul class="list-group col-4">
                <?php for($i = 0; $i < 13; $i++) : ?>
                    <?= view('partials/litem', ['num' => $i]) ?>
                <?php endfor ?>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>