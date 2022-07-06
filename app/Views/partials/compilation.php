<div class="comp_list">
    <a href="/compilations/<?= $item->id ?>" class="heading small"><?= $item->name ?></a>
    <?php if ($item->titles == []) : ?>
        <div class="empty">Пусто :(</div>
    <?php endif; ?>
    <div class="wrapper">
        <?php for($i = 0; $i < count($item->titles); $i++) : ?>   
            <a href="/watch/<?= $item->titles[$i]->name ?>" class="item">
                <img src="<?= base_url('images/'.$item->titles[$i]->image) ?>" alt="<?= $item->titles[$i]->name ?>">
                <div class="info">
                    <div class="title"><?= $item->titles[$i]->name ?></div>
                    <div class="genres">Genre, Genre, Genre</div>
                </div>
                <div class="mark" style="background-image: url('<?= base_url('assets/svg/mark_icon.svg') ?>');"><?= $item->titles[$i]->rating ?></div>
            </a>
        <?php endfor ?>
    </div>
    <div class="divider"></div>
</div>