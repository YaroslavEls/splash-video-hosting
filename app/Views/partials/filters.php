<form action="/" class="filters">
    <div class="close" style="background-image: url('<?= base_url('assets/svg/close_icon.svg'); ?>');"></div>

    <div class="heading large">Фильтры:</div>

    <div class="dub">
        <?php for($i = 0; $i < 4; $i++) : ?>
            <input type="checkbox" name="lang<?=$i?>" id="lang<?=$i?>">
            <label class="item" for="lang<?=$i?>">
                lang<?=$i?>
            </label>
            <!-- <div class="item">lang sub/voice</div> -->
        <?php endfor ?>
    </div>

    <div class="genres">
        <?php for($i = 0; $i < 20; $i++) : ?>
            <div class="item">genre name</div>
        <?php endfor ?>
    </div>
    
    <button>zxc</button>

</form>

<style>
    .filters input {
        display:none;
    }

    .filters {
        display: none;
        position: absolute;
        width: 1440px;
        height: 100%;
        background-color: rgb(53, 38, 50);
        z-index: 10;
    }

    .filters .close {
        width: 64px;
        height: 64px;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .filters .heading.large {
        color: #FAA4BD;
        margin: 36px 0 41px 157px;
    }

    .filters .dub {
        padding: 0 30px 35px;
        border-bottom: 4px solid #FFFFFF;
    }

    .filters .genres {
        display: grid;
        grid-template-columns: repeat(3, 480px);
        margin: 20px 30px;
    }

    .filters .item {
        display: inline-block;
        width: fit-content;
        height: fit-content;
        background: #FFFFFF;
        border-radius: 27.5px;
        font-weight: 300;
        font-size: 20px;
        line-height: 22px;
        letter-spacing: 0.1em;
        color: #352632;
        padding: 14px 20px;
        margin: 0 15px 0 0;
    }

    .filters .genres .item {
        margin: 0 15px 25px 0;
    }
</style>