<?= $this->extend('layouts/watch.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="information">
    <div class="fcol">
        <img src="<?= base_url('images/'.$data->image) ?>" alt="<?= $data->name ?>">
        <div class="add">Добавить в</div>
        <?php if (session()->get('isLoggedIn')) : ?>
            <div class="add-menu disabled">
                <form action="<?= base_url() ?>/add" method="post" id="add">
                    <input type="number" name="title" class="disabled" value="<?= $data->id ?>">
                    <input type="number" name="list" class="disabled">
                    <?php for ($i = 0; $i < count(session()->get('compsDefault')); $i++) : ?>
                        <div comp_id="<?= session()->get('compsDefault')[$i]->id ?>"><?= session()->get('compsDefault')[$i]->name ?></div>
                    <?php endfor; ?>
                    <?php for ($i = 0; $i < count(session()->get('comps')); $i++) : ?>
                        <div comp_id="<?= session()->get('comps')[$i]->id ?>"><?= session()->get('comps')[$i]->name ?></div>
                    <?php endfor; ?>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <div class="scol">
        <div class="stars"></div>
        <div class="name"><?= $data->name ?></div>
        <div class="desc">Описание:</div>
        <div class="line">
            <span>Жанры:</span>
            <div>
                <?php for($i = 0; $i < count($data->genres); $i++) : ?>
                    <a href="/genre/<?= $data->genres[$i] ?>"><?= $data->genres[$i].(isset($data->genres[$i+1]) ? ',' : '') ?></a>
                <?php endfor; ?>
            </div>
        </div>
        <div class="line"><span>Эпизоды:</span><?= $data->episodes ?></div>
        <div class="line"><span>Длительность:</span>???</div>
        <div class="line"><span>Год:</span>???</div>
        <div class="line"><span>Перевод:</span>???</div>
        <div class="line"><span>Цензура:</span>???</div>
        <div class="line"><span>Страна:</span>???</div>
        <div class="line"><span>Первоисточник:</span>???</div>
        <div class="line"><span>Студия:</span>???</div>
    </div>
</div>

<div class="player"></div>

<div class="description">
    <div class="desc">Сюжет:</div>
    <div class="text"><?= $data->desc ?></div>
</div>

<div class="divider"></div>
<div class="slider-wrap">
    <div class="desc">Новинки:</div>
    <?= view('partials/slider', ['data' => $novelties]); ?>
</div>
<div class="divider"></div>

<?= view('partials/comments', ['comments' => $comments]); ?>

<?= $this->endSection(); ?>