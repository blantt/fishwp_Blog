<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <style>
         body {
            margin: 0;
            padding: 0;
            height: 100%;
            /* 確保 body 和 html 高度也設定為100%222 */
            font-family: 'Noto Sans TC', sans-serif;
            /* 繁體中文 */
        }

        #post-container {
            width: 90%;
            margin: 20px auto;
            /* 上下邊距為20px，左右自動（auto）以實現居中 */
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* 可選，增加陰影效果以突出容器 */
            background-color:rgba(248, 247, 247,0.9);
        }

        #post-container .post {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;

        }

        #post-container .post h2 {
            color: #333;
        }

        #post-container .post .date {
            color: #666;
            font-size: 0.85em;
        }

        #post-container .post .content {
            text-align: justify;
        }

        .mybk {
 
            background-image: url(<?php echo get_theme_file_uri('/images/noteback2.png') ?>);
             
            /* background-size: contain; */
            background-size: 100% auto;
            background-position: top center;
           
        }
    </style>
</head>
<?php
  get_header('empty');
     ?>
<body class="mybk">
    <?php

    pageBanner2();

    ?>
    <div id="post-container">
        <?php
        // 創建一個新的查詢對象2
        $userNotes = new WP_Query(array(
            'post_type' => 'code',
            'posts_per_page' => -1,
            'author' => get_current_user_id()
        ));

        // 檢查是否有文章
        if ($userNotes->have_posts()) {
            while ($userNotes->have_posts()) {
                $userNotes->the_post();

                // 為每篇文章創建一個包含標題、時間和內容的HTML結構
                echo '<div class="post">';
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<p class="date">Published on: ' . get_the_date() . '</p>';
                echo '<p class="categories">文章分類: ';
                the_terms($post->ID, 'mybook', '', ', ');
                echo '</p>';
                echo '<div class="content">' . apply_filters('the_content', get_the_content()) . '</div>';
                echo '</div>'; // 文章容器結束
            }
        } else {
            echo '<p>No notes found.</p>';
        }

        // 重置全局$post物件
        wp_reset_postdata();
        ?>
    </div>
</body>

</html>