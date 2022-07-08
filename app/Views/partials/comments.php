<div class="comments" id="comments">
    <div class="name">Коментарии (<?= $count ?>):</div>
    <form action="<?= current_url() ?>" method="post" class="comment">
        <textarea name="text" placeholder="Комментарий..." required></textarea>
        <button>Отправить Коментарий</button>
    </form>

    <?php for($i = 0; $i < count($comments); $i++) : ?>
        <div class="item">
            <a href="/user/<?= $comments[$i]->id ?>" class="user">
                <img src="<?= base_url() ?>/images/user/<?= $comments[$i]->image ?>" alt="<?= $comments[$i]->username ?>">
                <div>
                    <div class="username"><?= $comments[$i]->username ?></div>
                    <div class="status">???</div>
                </div>
            </a>
            <div class="date"><?= mb_substr($comments[$i]->created_at, 0, 16) ?></div>
            <div class="text"><?= $comments[$i]->text ?></div>
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