<div class="header">
    <div class="registration">Регистрация</div>
    <div class="login">Войти</div>
    <div class="lang" style="background-image: url('<?= base_url('assets/svg/lang_icon.svg'); ?>');"></div>
    <div class="wrapper">
        <a href="/" class="logo">SH</a>
        <div>
            <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
            <form action="<?= explode('/', current_url())[4] == 'compilations' ? '/compilations' : '/' ?>">
                <input name="search" type="search" placeholder="Поиск">
                <div class="icon" style="background-image: url('<?= base_url('assets/svg/search_icon.svg'); ?>');"></div>
            </form>
        </div>
    </div>
</div>