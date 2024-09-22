<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">

</head>
<style>
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
<?php

pageBanner2();
 
?>

<div class="container-fluid">


    <div class="background-container">
        <!-- 内容 -->
        <div class="content">
            <div class="row" style="height:100%">
                <div class="col">
                    <!-- 第一个水平排列的内容 -->
                    <div class="text-center">
                        <h2 class="font1">淡魚之家</h2>
                        <p class="font1">世界危險而又美麗,與淡魚一同來冒險吧</p>
                    </div>
                    <div class="text-center">
                        <div class="div-style font1 box1">
                            <div class="box2">
                                <div class="box2_col3">
                                    <h4 class="font1">公佈欄</h4>
                                     
                                </div>

                                <div class="font1">

                                </div>
                                <!-- <div class="box2_col2">
                                    <h4 class="font1">公佈欄</h4>
                                </div> -->
                            </div>
                            <hr id="custom-hr">

                            <div>
                                即將開幕
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col book1">
                    <!-- 第二个水平排列的内容 -->
                    <div class="text-center ">
                        <h1></h1>
                    </div>
                </div>
                <div class="col">
                    <!-- 第三个水平排列的内容 -->
                    <div class="text-center">
                        <div class="div-style font1 box1" style="height:400px">
                            <div class="box2">
                                <div class="box2_col4">
                                    <h4 class="font1"></h4>

                                </div>

                                <div class="font1">

                                </div>
                                <!-- <div class="box2_col2">
                                    <h4 class="font1">公佈欄</h4>
                                </div> -->
                            </div>
                            <hr id="custom-hr">

                            <div>
                                
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>