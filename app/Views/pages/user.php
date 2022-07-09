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
    <?= view('partials/comps-menu'); ?>
    <div class="divider"></div>
    <div class="comps_content">
        <?php if (isset($list)) : ?>
            <?= view('partials/compilation', ['item' => $list]); ?>
        <?php else : ?>
            <?= view('partials/friends', ['data' => $friends, 'invites' => $invites]); ?>
        <?php endif; ?>
    </div>
</div>

<div class="arrow-top" style="background-image: url('<?= base_url('assets/svg/arrow_top.svg') ?>');"></div>

<?= $this->endSection(); ?>