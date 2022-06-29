<div class="menu">
    <a href="/" class="item <?= explode('/', current_url())[4] == 'compilations' ? '' : 'active' ?>">Тайтлы</a>
    <a href="/compilations" class="item <?= explode('/', current_url())[4] == 'compilations' ? 'active' : '' ?>">Подборки</a>
    <a href="/filters" class="item">Фильтры <span class="icon" style="background-image: url('<?= base_url('assets/svg/filter_icon.svg') ?>');"></span> </a>
</div>