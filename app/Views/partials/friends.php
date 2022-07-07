<div class="heading small">Друзья:</div>
<?php for ($i = 0; $i < count($friends); $i++) : ?>
    <div class="friends">
        <div class="item">
            <a href="/user/<?= $friends[$i]->id ?>"><img src="<?= base_url('images/user/'.$friends[$i]->image) ?>" alt="<?= $friends[$i]->username ?>"></a>
            <div>
                <a href="/user/<?= $friends[$i]->id ?>" class="name"><?= $friends[$i]->username ?></a>
                <div class="status">???</div>
            </div>
        </div>
    </div>
<?php endfor; ?>