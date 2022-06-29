<div class="item swiper-slide">
    <div class="image" style="background-image: url('<?= base_url('images/'.$item->image) ?>');">
        <div class="mark" style="background-image: url('<?= base_url('assets/svg/mark_icon.svg') ?>');"><?= $item->rating ?></div>
    </div>
    <div class="title">
        <?= $item->name ?>
    </div>
    <div class="views">
        0 <span class="icon" style="background-image: url('<?= base_url('assets/svg/views_icon.svg') ?>');"></span>
    </div>
</div>