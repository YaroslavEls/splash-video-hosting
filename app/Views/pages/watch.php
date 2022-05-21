<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row featurette justify-content-md-center align-items-center">
            <div class="col-md-4">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 300x400" preserveAspectRatio="xMidYMid slice" focusable="false" style="font-size: 1.125rem;text-anchor: middle;font-size: 3.5rem;"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">300x400</text></svg>
            </div>
            <div class="col-md-6">
                <h2 class="featurette-heading fw-normal lh-1" style="letter-spacing: -.05rem;font-size: 50px;"><?= $name ?></h2>
                <p class="lead"><?= $desc ?></p>
                <p class="lead"><span style="font-weight:400">Genres: </span><?= implode(', ', $genres); ?></p>
                <p class="lead"><span style="font-weight:400">Rating: </span><?= $rating ?></p>
            </div>
        </div>

        <hr class="featurette-divider" style="margin:5rem 0">

        <div class="row justify-content-md-center">
            <?php for($i = 0; $i < $episodes; $i++) : ?>
                <?= view('partials/episode', ['num' => $i]); ?>
            <?php endfor ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>