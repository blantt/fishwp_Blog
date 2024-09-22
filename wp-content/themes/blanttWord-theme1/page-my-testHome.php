<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   

</head>
<style>
        body {
        }

        .topmenu {
            height: 70px;
        }

        .background-container {
            position: relative;
            width: 100%;
            height: 500px; /* 设置容器高度 */
            overflow: hidden; /* 隐藏溢出内容 */
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
                opacity: 0.3; /* 设置透明度 */
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
//get_header();
?>
 
 <div class="container-fluid">

 
        <div class="background-container">
            <!-- 内容 -->
            <div class="content">
                <div class="row">
                    <div class="col">
                        <!-- 第一个水平排列的内容 -->
                        <div class="text-center">
                            <h2>Content 1</h2>
                            <p>This is content 1.</p>
                        </div>
                    </div>
                    <div class="col">
                        <!-- 第二个水平排列的内容 -->
                        <div class="text-center">
                            <h2>Content 2</h2>
                            <p>This is content 2.</p>
                        </div>
                    </div>
                    <div class="col">
                        <!-- 第三个水平排列的内容 -->
                        <div class="text-center">
                            <h2>Content 3</h2>
                            <p>This is content 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






