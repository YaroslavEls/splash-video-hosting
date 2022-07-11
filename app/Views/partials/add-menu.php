<?php if (session()->get('isLoggedIn')) : ?>
    <div class="add-menu disabled">
        <form action="<?= base_url() ?>/add" method="post" id="add">
            <input type="number" name="title" class="disabled" value="<?= $data->id ?>">
            <input type="number" name="list" class="disabled">
            <?php for ($i = 0; $i < count(session()->get('compsDefault')); $i++) : ?>
                <div class="add-item" comp_id="<?= session()->get('compsDefault')[$i]->id ?>"><?= session()->get('compsDefault')[$i]->name ?></div>
            <?php endfor; ?>
            <?php for ($i = 0; $i < count(session()->get('comps')); $i++) : ?>
                <div class="add-item" comp_id="<?= session()->get('comps')[$i]->id ?>"><?= session()->get('comps')[$i]->name ?></div>
            <?php endfor; ?>
        </form>
    </div>
<?php endif; ?>