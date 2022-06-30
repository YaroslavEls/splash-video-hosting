<div class="swiper">
    <div class="list swiper-wrapper" style="flex-wrap:nowrap">
        <?php for($i = 0; $i < count($data); $i++) : ?>
            <?= view('partials/title-item', ['item' => $data[$i]]) ?>
        <?php endfor ?>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    if (document.body.classList.contains('watch')) {
        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 5.6,
            spaceBetween: 48,
        });
    } else {
        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 4.5,
            spaceBetween: 48,
        });
    }
</script>