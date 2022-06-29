<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="content">
    <?= view('partials/menu_main') ?>

    <div class="novelties">
        <div class="heading large">Новинки:</div>
        <div class="swiper">
            <div class="list swiper-wrapper" style="flex-wrap:nowrap">
                <?php for($i = 0; $i < count($novelties); $i++) : ?>
                    <?= view('partials/seria_item', ['item' => $novelties [$i]]) ?>
                <?php endfor ?>
            </div>
        </div>
    </div>

    <div class="divider"></div>

    <div class="popular">
        <div class="heading medium">Популярное:</div>
        <div class="list">
            <?php for($i = 0; $i < count($popular); $i++) : ?>
                <?= view('partials/seria_item', ['item' => $popular[$i]]) ?>
            <?php endfor ?>
        </div>
    </div>

    <?= view('partials/pagination') ?>
</div>


<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        slidesPerView: 4.5,
        spaceBetween: 48,
    });
</script>


<?= $this->endSection(); ?>