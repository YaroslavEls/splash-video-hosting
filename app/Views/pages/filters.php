<div>
    <h2>Tags:</h2>
    <?php for($i = 0; $i < count($tags); $i++) : ?>
        <a href="/tag/<?= $tags[$i]->name ?>"><?= $tags[$i]->name ?></a>
        <br>
    <?php endfor ?>
    <br>
    <h2>Genres:</h2>
    <?php for($i = 0; $i < count($genres); $i++) : ?>
        <a href="/genre/<?= $genres[$i]->name ?>"><?= $genres[$i]->name ?></a>
        <br>
    <?php endfor ?>
</div>
