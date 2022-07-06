<?= $this->extend('layouts/user.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="pinned">
    <div class="heading small">Любимое:</div>
    <?php if ($favourite != []) : ?>
        <?= view('partials/slider', ['data' => $favourite]); ?>
    <?php else : ?>
        <div class="empty">Пусто :(</div>
    <?php endif ?>
</div>

<div class="user_comps">
    <div class="comps_menu">
        <?php for($i = 0; $i < count($user->compilationsDefault); $i++) : ?>
            <a href="/user/<?= $user->id ?>?list=<?= $user->compilationsDefault[$i]->id ?>" class="item <?= $list->id == $user->compilationsDefault[$i]->id ? 'active' : '' ?>"><?= $user->compilationsDefault[$i]->name ?></a>
        <?php endfor ?>
        <div class="divider">Подборки:</div>
        <?php for($i = 0; $i < count($user->compilations); $i++) : ?>
            <a href="/user/<?= $user->id ?>?list=<?= $user->compilations[$i]->id ?>" class="item <?= $list->id == $user->compilations[$i]->id ? 'active' : '' ?>"><?= $user->compilations[$i]->name ?></a>
        <?php endfor ?>
    </div>
    <div class="divider"></div>
    <div class="comps_content">
        <?= view('partials/compilation', ['item' => $list]) ?>
    </div>
</div>

<div class="arrow-top" style="background-image: url('<?= base_url('assets/svg/arrow_top.svg') ?>');"></div>

<?= $this->endSection(); ?>