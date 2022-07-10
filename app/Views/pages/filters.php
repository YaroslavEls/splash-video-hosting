<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<form action="/filters" method="post" class="filter" id="filter">
    <div class="heading large">Фильтры:</div>

    <div class="heading xsmall">Тэги</div>
    <?php for($i = 0; $i < count($tags); $i++) : ?>
        <?= view('partials/filter-item', ['data' => $tags[$i]]) ?>
    <?php endfor ?>

    <div class="heading xsmall">Жанры</div>
    <?php for($i = 0; $i < count($genres); $i++) : ?>
        <?= view('partials/filter-item', ['data' => $genres[$i]]) ?>
    <?php endfor ?>

    <input type="submit" id="conf">
    <label class="conf" for="conf">Поиск!</label>
</form>

<?= $this->endSection(); ?>