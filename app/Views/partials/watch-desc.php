<div class="stars">
    <?php for ($i = 0; $i < 10; $i++) : ?>
        <?php if (round($data->rating) > $i) : ?>
            <div class="star" style="background-image:url('<?= base_url('assets/svg/star.svg') ?>')"></div>
        <?php else: ?>
            <div class="star" style="background-image:url('<?= base_url('assets/svg/star_empty.svg') ?>')"></div>
        <?php endif; ?>
    <?php endfor; ?>
    <div class="label"><?= $data->rating ?>/10</div>
</div>
<div class="name"><?= $data->name ?></div>
<div class="desc">Описание:</div>
<div class="line">
    <span>Жанры:</span>
    <div>
        <?php for($i = 0; $i < count($data->genres); $i++) : ?>
            <a href="/filters/<?= $data->genres[$i] ?>"><?= $data->genres[$i].(isset($data->genres[$i+1]) ? ',' : '') ?></a>
        <?php endfor; ?>
    </div>
</div>
<div class="line"><span>Эпизоды:</span><?= $data->episodes ?></div>
<div class="line"><span>Длительность:</span>???</div>
<div class="line"><span>Год:</span>???</div>
<div class="line"><span>Перевод:</span>???</div>
<div class="line"><span>Цензура:</span>???</div>
<div class="line"><span>Страна:</span>???</div>
<div class="line"><span>Первоисточник:</span>???</div>
<div class="line"><span>Студия:</span>???</div>