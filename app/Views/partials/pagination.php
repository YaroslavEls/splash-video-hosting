<div class="pagination">
    <div class="arrow-top" style="background-image: url('<?= base_url('assets/svg/arrow_top.svg') ?>');"></div>
    <div class="page">
        <a href="?page=<?= $page-1 ?>" class="arrow-left" style="<?php echo $page == 1 ? 'visibility: hidden' : '' ?>; background-image: url('<?= base_url('assets/svg/arrow_left.svg') ?>');"></a>
        <div class="number"><?= $page.'/'.$pages ?></div>
        <a href="?page=<?= $page+1 ?>" class="arrow-right" style="<?php echo $page == $pages ? 'visibility: hidden' : '' ?>;background-image: url('<?= base_url('assets/svg/arrow_right.svg') ?>');"></a>
    </div>
</div>