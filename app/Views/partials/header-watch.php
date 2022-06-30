<div class="header">
    <?php if (session()->get('isLoggedIn')): ?>
        <a href="/user/<?= session()->get('id') ?>" class="user_photo"></a>
        <a href="/user/<?= session()->get('id') ?>" class="user_name"><?= session()->get('username') ?></a>
    <?php else: ?>
        <a href="/registration" class="registration">Регистрация</a>
        <a href="/login" class="login">Войти</a>
    <?php endif; ?>
    <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
</div>