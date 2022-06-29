<div class="comp_list">
    <a href="/compilations/<?= $item->id ?>" class="heading small"><?= $item->name ?></a>
    <div class="wrapper">
        <?php for($i = 0; $i < count($item->titles); $i++) : ?>   
            <div class="item">
                <div class="image" style="background-image: url(<?= base_url('images/'.$item->titles[$i]->image) ?>)"></div>
                <div class="info">
                    <div class="title"><?= $item->titles[$i]->name ?></div>
                    <div class="genres">Genre, Genre, Genre</div>
                </div>
                <div class="mark" style="background-image: url('<?= base_url('assets/svg/mark_icon.svg') ?>');"><?= $item->titles[$i]->rating ?></div>
            </div>
        <?php endfor ?>
    </div>
    <div class="divider"></div>
</div>