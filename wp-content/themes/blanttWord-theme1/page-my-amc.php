<!DOCTYPE html>

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
    /* 確保 body 和 html 高度也設定為100%222 */
    font-family: 'Noto Sans TC', sans-serif;
    /* 繁體中文 */


  }

  .itemfull {
    background-image: url(<?php echo get_theme_file_uri('/images/noteback1.png') ?>);
    background-size: cover;
    /* background-repeat: no-repeat;   */
    background-attachment: fixed;
    background-position: right center;

  }

  .fullbk {
    height: 100vh;


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

  #post-container {
    width: 90%;
    margin: 20px auto;
    /* 上下邊距為20px，左右自動（auto）以實現居中 */
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* 可選，增加陰影效果以突出容器 */
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
</style>

<div class=" fullbk box_container box_column box_start" style="height:100%; ">

  <div class="box_item boxrow box_column itemfull box下方 ">
    <div>
      <?php

      pageBanner2();

      ?>
    </div>
    <div id="post-container">
      <?php

      display_taxonomy_terms('amcfilter');

      // // 抓取 amcfilter 分類的所有細項
      // $terms = get_terms(array(
      //   'taxonomy' => 'amcfilter', // 指定分類法
      //   'hide_empty' => false      // 是否隱藏沒有文章的分類，false 表示顯示所有
      // ));

      // if (!empty($terms) && !is_wp_error($terms)) {

      //   echo '<div class="box_container box_start ">';
      //   echo '  <div style="padding-left:3px;">tag:  </div>';
      //   foreach ($terms as $term) {
      //     echo '  <div style="padding-left:10px;">';
      //    // echo '<li>';
      //     echo '<a href="' . esc_url(get_term_link($term)) . '">';
      //     echo esc_html($term->name);
      //     echo '</a>';
      //     //echo '</li>';
      //     echo '  </div>';
           
      //   }
      //   echo '</div>';
         
      // } else {
      //   //目前沒有分類細項
      // }


      // $category_name = isset($_GET['tag']) ? sanitize_text_field($_GET['tag']) : '';

      // $tax_query = array();
      // if (!empty($category_name)) {
      //   $tax_query[] = array(
      //     'taxonomy' => 'amcfilter',
      //     'field' => 'name',
      //     'terms' => $category_name
      //   );
      // }

      // $userNotes = new WP_Query(array(
      //   'post_type' => 'AMC',                // 自訂文章類型
      //   'posts_per_page' => -1,             // 取得所有文章
      //   //'author' => get_current_user_id(),  // 篩選目前使用者的文章
      //   'tax_query' => $tax_query
      // ));

      $userNotes = get_filtered_posts('AMC', 'amcfilter');
      // 檢查是否有文章
      if ($userNotes->have_posts()) {
        while ($userNotes->have_posts()) {
          $userNotes->the_post();

          // 為每篇文章創建一個包含標題、時間和內容的HTML結構2
          echo '<div class="post">';
          echo '<h2>' . get_the_title() . '</h2>';
          echo '<p class="date">Published on: ' . get_the_date() . '</p>';
          echo '<p class="categories">文章分類: ';
          the_terms($post->ID, 'amcfilter', '', ', ');
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


  </div>

  


</div>