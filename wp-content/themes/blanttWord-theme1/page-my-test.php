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

        .fullbk {
            height: 100vh;
            background-image: url(<?php echo get_theme_file_uri('/images/fishbk3.png') ?>);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: right center;
        }

        .box上方 {
            /*  background-color:aquamarine;22*/
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

        
    </style>

</head>
<?php get_header('empty'); ?>

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
            <!-- <div>
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu3
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                </ul>
            </div> -->
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