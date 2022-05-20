<div class="col">
    <div class="card shadow-sm">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="font-size:1.125rem;text-anchor:middle;"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        <div class="card-body">
            <p class="card-title" style="font-weight:bold;font-size:18px"><?= $data[$num]->name ?></p>
            <p class="card-text"><?= $data[$num]->desc ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/watch/<?= $data[$num]->name ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">Rating: <?= $data[$num]->rating ?></small>
            </div>
        </div>
    </div>
</div>