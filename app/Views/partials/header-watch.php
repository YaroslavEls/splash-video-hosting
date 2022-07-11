<div class="header">
    <?php if (session()->get('isLoggedIn')): ?>
        <a href="/user/<?= session()->get('id') ?>" class="user_photo"><img src="<?= base_url('images/user/'.session()->get('image')) ?>" alt="<?= session()->get('username') ?>"></a>
        <a href="/user/<?= session()->get('id') ?>" class="user_name"><?= session()->get('username') ?></a>
    <?php else: ?>
        <a href="/registration" class="registration">Регистрация</a>
        <a href="/login" class="login">Войти</a>
    <?php endif; ?>
    <div class="wrapper">
        <a href="/" class="logo">SH</a>
        <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
    </div>
</div>