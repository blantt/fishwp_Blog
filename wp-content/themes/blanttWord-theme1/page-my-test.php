<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">



    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            /* 確保 body 和 html 高度也設定為100%222 */
            font-family: 'Noto Sans TC', sans-serif;
            /* 繁體中文 */
        }


        .card {
            margin-left: 10px;
            padding: 10px;
            width: 350px;
            border-radius: 10px !important;
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.2);
        }


        .bigcard {
            width: 98%;
            background-color: rgba(154, 156, 204, 0.5) !important;
            border: 1px solid #4caf50;
            /* 設定邊框的粗細、樣式和顏色 */
            border-radius: 15px !important;
            /* 設定圓角半徑 */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);

        }

        .bigcardtop {
            background-color: rgb(237, 246, 227) !important;
            width: 98%;
            height: 50px;
            border: 1px solid #4caf50;
            /* 設定邊框的粗細、樣式和顏色 */
            border-radius: 15px !important;
            /* 設定圓角半徑 */
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 800 !important;
            letter-spacing: 2px;
            font-size: 22px;
            color: rgb(42, 93, 58);

        }

        .image-container {
           
            height: 350px;
            /* 設定高度 */
            /* background-image: url(<?php echo get_theme_file_uri('/images/pic黑板封面.png') ?>); */
            background-size: cover;
            /* ackground-size cover:填滿容器;contain:全顯示圖片;auto:原始大小 */
            background-position: center;
            /* 選擇 background-position */
            background-repeat: no-repeat;
            /* no-repeat;repeat;repeat-x;repeat-y */
        }

        /* 圖片的基本樣式 */
        .image-link img {
            display: block; /* 確保圖片是區塊元素，便於設置 */
            width: 100%; /* 設置圖片大小 */
            height: 100%;
            transition: 0.3s ease; /* 增加過渡效果 */
        }

        /* 滑鼠懸停效果 */
        .image-link img:hover {
            filter: brightness(85%); /* 讓圖片變暗 */
            cursor: pointer; /* 提示為可點擊 */
        }

        /* 點擊 (active) 時的效果 */
        .image-link img:active {
            filter: brightness(70%); /* 點擊時更加暗淡 */
            transform: scale(0.95); /* 點擊時縮小 */
        }
    </style>

</head>
<?php get_header('empty'); ?>
<div>
      <?php

      pageBanner2();

      ?>
    </div>
<div class="card bigcardtop ">
   漫漫人生
</div>
<div class="card bigcard  ">
    <div class="box_container boxrow   ">
        <div class="box_item  ">
            <div class="card my-div">
                <div class="image-container">
                <a href="<?php echo esc_url(site_url('/books/黑板的秘密')); ?>" class="image-link">
                    <img src="<?php echo get_theme_file_uri('/images/pic黑板封面.png') ?>" alt="描述文字" class="image-effect">
                </a>
                </div>
                <div class="card-header">
                    <h3>黑板的秘密</h3>
                </div>
                <div class="card-body">
                    <h7>一位路痴少女和一位天才理工男相遇,<br />
                    一同破解了一件校園多年來的靈異事件</h7>
                </div>
            </div>
        </div>

    </div>

</div>