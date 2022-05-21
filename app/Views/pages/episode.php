<?= $this->extend('layouts/main.layout.php'); ?>


<?= $this->section('content'); ?>

<div class="album py-5 bg-light">
    <div class="px-4 my-5 text-center">
        <h1 class="display-4 fw-bold"><?= $data->title->name ?></h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Episode <?= $data->episode->number ?></p>
            <div class="d-grid d-sm-flex justify-content-sm-center mb-5">
                <a href="/watch/<?= $data->title->name ?>" type="button" class="btn btn-outline-secondary btn-lg px-4" style="width:200px;margin-right:10px;">Go Back</a>
                <a href="/watch/<?= $data->title->name ?>/episode/<?= $data->episode->number + 1 ?>" type="button" class="btn btn-secondary btn-lg px-4" style="width:200px;margin-left:10px;">Next episode</a>
            </div>
        </div>
        <div class="container">
            <div style="display:block;width:800px;height:400px;background:white;margin:0 auto;border:3px solid #000"></div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>