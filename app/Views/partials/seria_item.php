<div class="item">
    <div class="image" style="background-image: url('<?= base_url('images/'.$data[$num]->image) ?>');">
        <div class="mark" style="background-image: url('<?= base_url('assets/svg/mark_icon.svg') ?>');"><?= $data[$num]->rating ?></div>
    </div>
    <div class="title">
        <?= $data[$num]->name ?>
    </div>
    <div class="views">
        0 <span class="icon" style="background-image: url('<?= base_url('assets/svg/views_icon.svg') ?>');"></span>
    </div>
</div>