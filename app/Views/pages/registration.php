<?= $this->extend('layouts/auth.layout.php'); ?>


<?= $this->section('content'); ?>

<form action="/registration" method="post" class="auth_form reg_form">
    <div class="nav_options">
        <a href="/" class="option">Назад на главную</a>
        <a href="/login" class="option">Уже есть аккаунт?</a>
    </div>
    <div class="heading">Регистрация</div>
    <div class="fields">
        <div class="name">Email</div>
        <input type="text" name="email">
        <div class="name">Username</div>
        <input type="text" name="username">
        <div class="name">Пароль</div>
        <input type="text" name="password">
        <div class="name">Повт. пароль</div>
        <input type="text" name="passwordRepeat">
    </div>
    <div class="buttons">
        <button type="submit" class="confirm">Подтвердить</button>
        <button class="cancel">Отменить</button>
    </div>
</form>

<?= $this->endSection(); ?>