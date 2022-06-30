<div class="comments">
    <div class="name">Коментарии:</div>
    <form action="" class="comment">
        <input type="text">
        <button>Отправить Коментарий</button>
    </form>

    <?php for($i = 0; $i < 5; $i++) : ?>
        <div class="item">
            <div class="user">
                <div class="image"></div>
                <div>
                    <div class="username">SeventhSenpai</div>
                    <div class="status">Status</div>
                </div>
            </div>
            <div class="text">
                Честно скажу. Скотилось качество (и количество стычек). И это я говорю потому что, я смотрел прошлые сезоны от Анидаб, и эти сезоны просто невозможно крутые! Я сейчас я посмотрел от дома каст и эмоции после просмотра (по сравнению с прошлыи) 7/10. Но если кому-то не понравились мои мысли простите( ещё чтобы понять то что я сказал, прошу к просмотру прошлых сезонов, от озвучьки Анидаб.
            </div>
        </div>
    <?php endfor; ?>

    <div class="more">
        Показать больше
        <span class="icon" style="background-image: url(<?= base_url('assets/svg/more_icon.svg') ?>)"></span>
    </div>
    <div class="arrow-top">
        <div class="button">наверх</div>
        <span class="icon" style="background-image: url(<?= base_url('assets/svg/arrow_top_user.svg') ?>)"></span>
    </div>
</div>