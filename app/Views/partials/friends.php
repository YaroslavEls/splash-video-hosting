<?php if ($invites != []) : ?>
    <div class="heading small">Заявки:</div>
    <?php for ($i = 0; $i < count($invites); $i++) : ?>
        <?php for ($i = 0; $i < count($invites); $i++) : ?>
            <div class="friends">
                <div class="item">
                    <a href="/user/<?= $invites[$i]->id ?>"><img src="<?= base_url('images/user/'.$invites[$i]->image) ?>" alt="<?= $invites[$i]->username ?>"></a>
                    <div>
                        <a href="/user/<?= $invites[$i]->id ?>" class="name"><?= $invites[$i]->username ?></a>
                        <div class="status">???</div>
                    </div>
                    <div class="buttons">
                        <?php if ($invites[$i]->direction == 'incoming') : ?>
                            <a href="/user/<?= $invites[$i]->id ?>/accept" class="accept">Принять</a>
                            <a href="/user/<?= $invites[$i]->id ?>/decline" class="decline">Отклонить</a>
                        <?php elseif ($invites[$i]->direction == 'outgoing') : ?>
                            <div>Запрос отправлен <br> Ожидание ответа</div>
                            <br>
                            <a href="/user/<?= $invites[$i]->id ?>/cancel" class="decline">Отменить</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    <?php endfor; ?>
<?php endif; ?>

<div class="heading small">Друзья:</div>
<?php for ($i = 0; $i < count($data); $i++) : ?>
    <div class="friends">
        <div class="item">
            <a href="/user/<?= $data[$i]->id ?>"><img src="<?= base_url('images/user/'.$data[$i]->image) ?>" alt="<?= $data[$i]->username ?>"></a>
            <div>
                <a href="/user/<?= $data[$i]->id ?>" class="name"><?= $data[$i]->username ?></a>
                <div class="status">???</div>
            </div>
        </div>
    </div>
<?php endfor; ?>