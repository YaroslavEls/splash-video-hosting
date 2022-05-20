<?= $this->extend('layouts/mainLayout'); ?>


<?= $this->section('content'); ?>

<?php for($i = 0; $i < count($data); $i++) : ?>
    <?= view('partials/card', ['num' => $i]); ?>
<?php endfor ?>

<?= $this->endSection(); ?>