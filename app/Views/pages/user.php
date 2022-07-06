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
        <?php for($i = 0; $i < count($user->compsDefault); $i++) : ?>
            <a href="/user/<?= $user->id ?>?list=<?= $user->compsDefault[$i]->id ?>" class="item <?= $list->id == $user->compsDefault[$i]->id ? 'active' : '' ?>"><?= $user->compsDefault[$i]->name ?></a>
        <?php endfor ?>
        <div class="divider">Подборки:</div>
        <form action="<?= base_url() ?>/create" method="post" id="create">
            <input type="text" name="name" style="display:none">
            <div class="item create-comp">+ Создать</div>
        </form>
        <?php for($i = 0; $i < count($user->comps); $i++) : ?>
            <a href="/user/<?= $user->id ?>?list=<?= $user->comps[$i]->id ?>" class="item <?= $list->id == $user->comps[$i]->id ? 'active' : '' ?>"><?= $user->comps[$i]->name ?></a>
        <?php endfor ?>
    </div>
    <div class="divider"></div>
    <div class="comps_content">
        <?= view('partials/compilation', ['item' => $list]) ?>
    </div>
</div>

<div class="arrow-top" style="background-image: url('<?= base_url('assets/svg/arrow_top.svg') ?>');"></div>

<?= $this->endSection(); ?>