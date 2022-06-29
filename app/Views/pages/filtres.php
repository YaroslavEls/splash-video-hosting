<div class="qwe">
    <?php for($i = 0; $i < count($data); $i++) : ?>
        <a class="swiper-slide" href="/genre/<?= $data[$i]->name ?>"><?= $data[$i]->name ?></a>
        <br>
    <?php endfor ?>
</div>
