<?= $this->extend('layouts/titleLayout'); ?>


<?= $this->section('content'); ?>

<h2>
    Watch
    <p style="color:red;display:inline">
        <?= $name ?>
    </p>
    <br>
    Description:
    <p style="color:orange;display:inline">
        <?= $desc ?>
    </p>
</h2>

<?= $this->endSection(); ?>
