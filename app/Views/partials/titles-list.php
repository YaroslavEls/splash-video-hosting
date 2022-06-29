<div class="list">
    <?php for($i = 0; $i < count($data); $i++) : ?>
        <?= view('partials/title-item', ['item' => $data[$i]]) ?>
    <?php endfor ?>
</div>