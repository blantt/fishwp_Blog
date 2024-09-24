<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">

</head>
<?php get_header('empty'); ?>
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        /* 確保 body 和 html 高度也設定為100%33 */  
        font-family: 'Noto Sans TC', sans-serif;
        /* 繁體中文 */
    }

    .fullbk {
        height: 100vh;
        background-image: url(<?php echo get_theme_file_uri('/images/fishbk3.png') ?>);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: right center;
    }

    .box上方 {
        /*  background-color:aquamarine;*/
        padding-top: 0px;
        height: 30px;
    }

    .box下方 {
        /* background-color: darkgray;*/
        padding-top: 0px;
    }

    .back {}

    .talk {
        width: 250px;
        height: 300px;
        color: white;
        padding-right: 0px;
        position: absolute;
        bottom: 20px;
        right: 50px;
    }

    .bk2 {

        width: 230px;
        height: 60px;
        background-image: url(<?php echo get_theme_file_uri('/images/bkborder3.png') ?>);
        background-size: contain;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        /* 水平居中 */
        /*align-items: center;*/
        /* 垂直居中 */
        padding-top: 2px;
    }

    .bk3 {
        padding-left: 2px;
        padding-right: 2px;
        font-size: 12px;
        width: 230px;
        height: 200px;
        border: 1px solid black;
        border-color: rgb(182, 186, 133);
    }

    /* ============= */
    #custom-hr {
        width: 90%;
        height: 3px;
        border: none;
        background-color: rgb(56, 106, 185);
        margin: 10px auto;
    }


    .div-style {
        /*基本邊框和填充*/
        border: 2px solid rgb(56, 106, 185);
        border-radius: 10px;
        padding: 10px;
        margin: 20px;
        /*添加陰影*/
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
        /* 添加陰影 */
        background-color: rgba(178, 210, 201, 0.3);
        /* 設置背景色 */

    }

    .box1 {
        display: flex;
        flex-direction: column;
        /* 子元素垂直排列 */
        width: 90%;
        height: 250px;

    }

    .box2 {
        display: flex;

    }

    .box2_col1 {
        width: 50px;
        height: 40px;
        background-image: url(<?php echo get_theme_file_uri('/images/iconfish.png') ?>);
        background-size: cover;

    }

    .box2_col2 {

        flex-grow: 1;
    }

    .box2_col3 {
        width: 100%;
        height: 40px;
        background-image: url(<?php echo get_theme_file_uri('/images/iconfish.png') ?>);
        background-size: 50px 40px;
        background-repeat: no-repeat;
        background-position: left center;
    }

    .box2_col4 {
        width: 100%;
        height: 40px;
        background-image: url(<?php echo get_theme_file_uri('/images/icon生物1.png') ?>);
        background-size: 50px 40px;
        background-repeat: no-repeat;
        background-position: left center;
    }

    .topmenu {
        height: 70px;
    }

    .background-container {
        position: relative;
        width: 100%;
        height: 500px;
        /* 设置容器高度 */
        overflow: hidden;
        /* 隐藏溢出内容 */
    }

    .font1 {
        font-family: "Zen Maru Gothic", serif;
        font-weight: 400;
        font-style: normal;
        color: rgb(29, 27, 128);
    }

    .book1 {

        background-size: cover;
        width: 100%;
        height: 100%;
        background-image: url(<?php echo get_theme_file_uri('/images/主角設定1.png') ?>);
    }

    /* 设置背景图及透明度 */
    .background-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(<?php echo get_theme_file_uri('/images/fishbk2.png') ?>);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.3;
        /* 设置透明度 */
        z-index: -1;
    }

    /* 内容样式 */
    .content {
        position: relative;
        z-index: 1;
        padding: 20px;
        color: blue;
    }
</style>


<div class=" fullbk box_container box_column box_start" style="height:100%;background-color:burlywood">
    <div class="box_container boxrow ">

    </div>

    <div class="box_item boxrow box上方  ">
        <?php

        pageBanner2();

        ?>
    </div>
    <div class="box_item boxrow itemfull box下方 ">
        <div class="boxrow">

        </div>
        <div class="boxrow">

        </div>
        <div class="boxrow" style="position: relative; ">
            <div class="talk">

                <div class="bk2">
                    公佈欄
                </div>
                <div class="bk3">
                    我是淡魚,
                    這是記錄著自己生活和學習歷程的小園地,
                    希望是個溫暖,微微又堅定的散發光芒,
                    期許自己也要持續更新!
                    <p>
                        漫畫連載中!敬請期待

                </div>
            </div>
        </div>
    </div>



</div>