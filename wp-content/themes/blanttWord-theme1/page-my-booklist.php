<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .card {
            width: 100%;

            background-color: rgb(200, 200, 200);
            border-radius: 3px;
            border: 1px solid #a1a1a1;
            padding: 20px;
            border-radius: 5px;
        }

        .card .pic img {
            width: 100%;
        }

        .card .card-header {
            border: none;
            background-color: transparent;
            height: 40px;
        }

        .card .card-footer {
            border: none;
        }


        .image-container {
            height: 450px;
            /* 設定高度3 */
            background-image: url(<?php echo get_theme_file_uri('/images/pic黑板封面.png') ?>);
            background-size: cover;
            background-position: center;
            /* 讓圖片置中顯示 */
            background-repeat: no-repeat;
            /* 防止圖片重複 */
        }

        .image-container2 {
            height: 450px;
            /* 設定高度 */
            /* background-image: url(<?php echo get_theme_file_uri('/images/pic黑板封面.png') ?>); */
            background-size: cover;
            background-position: center;
            /* 讓圖片置中顯示 */
            background-repeat: no-repeat;
            /* 防止圖片重複 */
        }
    </style>
</head>
<?php
get_header('empty');
?>

<body class="mybk">
    <?php

    // pageBanner2();

    ?>
    <div class="custom-page-content">
        <h1>漫漫人生</h1>

    </div>
     
    <div class="box_container">
        <div class="box_item col4">

            <div class="card">
                <div class="image-container">
                </div>
                <div class="card-header">
                    <div class="box_container">
                        <div class="box_item">
                            <h3>
                              黑板的秘密
                            </h3>
                        </div>
                        <div class="box_item" style=" margin-left: auto;">
                           <a href="<?php echo esc_url(site_url('/books/黑板的秘密')); ?>">閱讀</a>
                        </div>
                    </div>
                   
                    

                </div>
                <div class="card-body">
                    <h7>
                        一位路痴少女和一位天才理工男相遇,<br />
                        一同破解了一件校園多年來的靈異事件
                    </h7>



                </div>
                <!-- <div class="card-footer">
                    <h5>
                        
                    </h5>
                </div> -->

            </div>


        </div>
        <div class="box_item col4">

            <div class="card">
                <div class="image-container2">
                </div>
                <div class="card-header">
                    <h3>

                    </h3>
                </div>
                <div class="card-body">
                    <h7>

                    </h7>



                </div>


            </div>


        </div>
    </div>
</body>

</html>