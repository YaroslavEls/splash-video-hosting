<input type="checkbox" name="<?= $data->name ?>" id="<?= $data->id ?>">
<label class="tag" for="<?= $data->id ?>">
    <?= $data->name ?>
    <div class="checked" style="background-image: url('<?= base_url('assets/svg/checked-icon.svg'); ?>');"></div>
    <div class="circle"></div>
</label>