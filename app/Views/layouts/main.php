<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?= $this->include('partials/header'); ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
</div>

<?= $this->include('partials/footer'); ?>
</body>
</html>