<a href="/watch/<?= $item->name ?>" class="item swiper-slide">
    <img src="<?= base_url('images/'.$item->image) ?>" alt="<?= $item->name ?>">
    <div class="mark" style="background-image: url('<?= base_url('assets/svg/mark_icon.svg') ?>');"><?= $item->rating ?></div>
    <div class="title">
        <?= $item->name ?>
    </div>
    <div class="views">
        0 <span class="icon" style="background-image: url('<?= base_url('assets/svg/views_icon.svg') ?>');"></span>
    </div>
</a>