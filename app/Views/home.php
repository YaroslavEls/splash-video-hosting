<?= $this->extend('layouts/main'); ?>


<?= $this->section('content'); ?>

<?php for($i = 0; $i < 12; $i++) : ?>
    <?= $this->include('partials/card'); ?>
<?php endfor ?>

<?= $this->endSection(); ?>