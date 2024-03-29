<div class="header">
    <?php if (session()->get('isLoggedIn')): ?>
        <a href="/user/<?= session()->get('id') ?>" class="user_photo"><img src="<?= base_url('images/user/'.session()->get('image')) ?>" alt="<?= session()->get('username') ?>"></a>
        <a href="/user/<?= session()->get('id') ?>" class="user_name"><?= session()->get('username') ?></a>
    <?php else: ?>
        <a href="/registration" class="registration">Регистрация</a>
        <a href="/login" class="login">Войти</a>
    <?php endif; ?>
    <div class="lang" style="background-image: url('<?= base_url('assets/svg/lang_icon.svg'); ?>');"></div>
    <div class="wrapper">
        <a href="/" class="logo">SH</a>
        <div class="wrapper_x2">
            <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
            <form action="<?= explode('/', current_url())[4] == 'compilations' ? '/compilations/search' : '/search' ?>" id="search">
                <input name="search" type="search" placeholder="Поиск">
                <div class="icon" style="background-image: url('<?= base_url('assets/svg/search_icon.svg'); ?>');"></div>
            </form>
        </div>
    </div>
</div>