<?= $this->extend('layouts/auth.layout.php'); ?>

<?= $this->section('content'); ?>

<form action="/login" method="post" class="auth_form log_form">
    <div class="nav_options">
        <a href="/" class="option">Назад на главную</a>
        <a href="/registration" class="option">Еще нет аккаунта?</a>
    </div>
    <div class="heading">Войти</div>
    <div class="fields">
        <div class="name">Email</div>
        <input type="text" name="email">
        <div class="name">Пароль</div>
        <input type="text" name="password">
    </div>
    <div class="buttons">
        <button type="submit" class="confirm">Подтвердить</button>
        <button class="cancel">Отменить</button>
    </div>
</form>

<?= $this->endSection(); ?>