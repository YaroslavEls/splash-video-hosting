<?= $this->extend('layouts/watch.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="information">
    <div class="fcol">
        <img src="<?= base_url('images/'.$data->image) ?>" alt="<?= $data->name ?>">
        <div class="add">Добавить в <div class="exp" style="background-image:url('<?= base_url('assets/svg/expand_icon.svg') ?>')"></div></div>
        <?= view('partials/add-menu'); ?>
    </div>
    <div class="scol">
        <?= view('partials/watch-desc'); ?>
    </div>
</div>

<div class="player"></div>

<div class="description">
    <div class="desc">Сюжет:</div>
    <div class="text"><?= $data->desc ?></div>
</div>

<div class="divider"></div>
<div class="slider-wrap">
    <div class="desc">Новинки:</div>
    <?= view('partials/slider', ['data' => $novelties]); ?>
</div>
<div class="divider"></div>

<?= view('partials/comments', ['comments' => $comments]); ?>

<?= $this->endSection(); ?>