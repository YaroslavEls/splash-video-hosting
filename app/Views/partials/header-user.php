<div class="header">
    <h1 class="heading"><a href="/"><span>Splash</span>-Hentai</a></h1>
    <div class="wrapper">
        <div class="image"></div>
        <div>
            <div class="name">SeventhSenpai</div>
            <div class="rank">Отаку</div>
        </div>
    </div>
</div>

<style>
    body.user .header {
        background: 0;
        border: 0;
        margin-left: 30px;
    }

    body.user h1 {
        width: fit-content;
        margin: 0 0 36px 0;
    }

    body.user .wrapper {
        align-items: center;
    }

    .header .wrapper .image {
        width: 209px;
        height: 209px;
        background-color: #fff;
        margin-right: 20px;
        border-radius: 50%; 
    }

    .header .wrapper .name {
        font-weight: 300;
        font-size: 30px;
        line-height: 33px;
        letter-spacing: 0.1em;
        color: #FFFFFF;
        margin-bottom: 20px;
    }

    .header .wrapper .rank {
        display: inline-block;
        background: #FFFFFF;
        padding: 5px 18px;
        border-radius: 25px 25px 25px 0px;
        font-weight: 300;
        font-size: 20px;
        line-height: 22px;
        letter-spacing: 0.1em;
        color: #352632;
    }


    .pinned {
        padding: 0 30px 36px;
        border-bottom: 12px solid #FAA4BD;

    }

    .pinned .heading {
        margin-left: 370px;
        margin-bottom: 10px;
    }

    .user_comps {
        display: flex;
    }

    .user_comps .comps_menu {
        min-width: 370px;
        padding: 30px 35px 35px;
    }

    .user_comps .comps_menu .item {
        width: fit-content;
        font-weight: 300;
        font-size: 25px;
        line-height: 28px;
        letter-spacing: 0.1em;
        color: #000000;
        padding: 8px 18px;
        border: 2px solid #352632;
        border-radius: 25px;
        margin-bottom: 30px;
    }

    .user_comps .comps_menu .item.active {
        position: relative;
        background: #352632;
        border: 2px solid #F7F2F4;
        color: #F7F2F4;
    }

    .user_comps .comps_menu .item.active::before {
        content: "";
        position: absolute;
        top: -4px;
        left: -15px;
        display: block;
        width: 4px;
        height: 50px;
        border-radius: 50px;
        background: #352632;
    }

    .user_comps .divider {
        min-width: 6px;
        background: #FAA4BD;
    }

    .user_comps .comps_content {
        margin: 14px 20px 91px;
        width: 100%;
    }

    .footer .divider{
        width: 6px;
        height: 100%;
        background: #FAA4BD;
        margin-left: 370px;
        position: relative;
        top: -60px;
    }

    .user_comps .comps_content .comp_list .item:last-child {
        border-bottom: 2px solid rgba(78, 78, 78, 0.5)
    }

    

</style>