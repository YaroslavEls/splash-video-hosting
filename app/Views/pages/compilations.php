<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="comp_popular">
    <div class="heading medium" style="margin-bottom:35px">Популярное:</div>

    <?php if (!$data) : ?>
        <h2>Ничего не найдено :(</h2>
    <?php endif ?>
    
    <?php for($i = 0; $i < count($data); $i++) : ?>
        <?= view('partials/compilation', ['item' => $data[$i]]) ?>
    <?php endfor ?>
</div>

<?= $this->endSection(); ?>