<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&;700&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link href="<?= base_url('assets/styles/style.css'); ?>" rel="stylesheet">
</head>
<body class="watch">
    <div class="wrapper">
        <?= $this->include('partials/header-watch'); ?>
        <?= $this->renderSection('content'); ?>
        <?= $this->include('partials/footer-watch'); ?>
    </div>

    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
</body>
<style>
    @font-face {
        font-family: 'Anime Ace v05';
        src: url('<?= base_url('assets/fonts/anime_ace_v05.eot'); ?>'); /* IE 9 Compatibility Mode */
        src: url('<?= base_url('assets/fonts/anime_ace_v05.eot?#iefix'); ?>') format('embedded-opentype'), /* IE < 9 */
            url('<?= base_url('assets/fonts/anime_ace_v05.woff2'); ?>') format('woff2'), /* Super Modern Browsers */
            url('<?= base_url('assets/fonts/anime_ace_v05.woff'); ?>') format('woff'), /* Firefox >= 3.6, any other modern browser */
            url('<?= base_url('assets/fonts/anime_ace_v05.ttf'); ?>') format('truetype'), /* Safari, Android, iOS */
            url('<?= base_url('assets/fonts/anime_ace_v05.svg#anime_ace_v05'); ?>') format('svg'); /* Chrome < 4, Legacy iOS */
    }

    @font-face {
        font-family: 'Anime Ace v3';
        src: url('<?= base_url('assets/fonts/anime_ace_v3.eot'); ?>'); /* IE 9 Compatibility Mode */
        src: url('<?= base_url('assets/fonts/anime_ace_v3.eot?#iefix'); ?>') format('embedded-opentype'), /* IE < 9 */
            url('<?= base_url('assets/fonts/anime_ace_v3.woff2'); ?>') format('woff2'), /* Super Modern Browsers */
            url('<?= base_url('assets/fonts/anime_ace_v3.woff'); ?>') format('woff'), /* Firefox >= 3.6, any other modern browser */
            url('<?= base_url('assets/fonts/anime_ace_v3.ttf'); ?>') format('truetype'), /* Safari, Android, iOS */
            url('<?= base_url('assets/fonts/anime_ace_v3.svg#anime_ace_v3'); ?>') format('svg'); /* Chrome < 4, Legacy iOS */
    }
</style>
</html>