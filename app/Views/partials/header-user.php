<div class="header">
    <?php if (session()->get('isLoggedIn')): ?>
        <?php if (session()->get('id') == $user->id): ?>
            <a href="/" class="settings">*Настройки</a>
            <a href="/exit" class="exit">Выйти</a>
        <?php else : ?>
            <a href="/user/<?= session()->get('id') ?>" class="user_photo"><img src="<?= base_url('images/user/'.session()->get('image')) ?>" alt="<?= session()->get('username') ?>"></a>
            <a href="/user/<?= session()->get('id') ?>" class="user_name"><?= session()->get('username') ?></a>
        <?php endif; ?>
    <?php else: ?>
        <a href="/registration" class="registration">Регистрация</a>
        <a href="/login" class="login">Войти</a>
    <?php endif; ?>

    <?php if (session()->get('isLoggedIn') && (session()->get('id') != $user->id)) : ?>
        <?php if (in_array($user->id, session()->get('friends'))) : ?>
            <a href="/user/<?= $user->id ?>/remove" class="add-friend">Удалить из друзей -</a>
        <?php else : ?>
            <a href="/user/<?= $user->id ?>/invite" class="add-friend">Добавить в Друзья +</a>
        <?php endif; ?>
    <?php endif; ?>
    
    <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
    <div class="wrapper">
        <img src="<?= base_url('images/user/'.$user->image) ?>" alt="<?= $user->username ?>">
        <div>
            <div class="name"><?= $user->username ?></div>
            <div class="rank">???</div>
        </div>
    </div>
</div>