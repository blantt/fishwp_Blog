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
<?php

   $godfiltertype = cookie_pageSingle;

?>
<script>
  
  
  document.addEventListener("DOMContentLoaded", function() {
    let pageShowType = "<?php echo $godfiltertype; ?>";
    
    // 讀取 Cookie 並設定控制項的預設值
    let mode = getCookie(pageShowType);
    //alert('aaa1')
    if (mode) {
      if (mode === "1") {
        document.getElementById("checkSingle").checked = true;
      } else {
        document.getElementById("checkSingle").checked = false;
      }
    };

    
    document.getElementById("checkSingle").addEventListener("change", function () {
        let selectedMode = this.checked ? "1" : "0";
        document.cookie = pageShowType+"=" + selectedMode + "; path=/; max-age=" + (30 * 24 * 60 * 60); // 設定 30 天有效
        // 強制刷新頁面
       location.reload();
    });


  });
  // // 獲取 Cookie 的函數
  // function getCookie(name) {
  //     let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
  //     return match ? match[2] : null;
  // }
</script>
<div class=" fullbk box_container box_column box_start" style="height:100%; ">

  <div class="box_item boxrow box_column itemfull box下方 ">
    <div>
      <?php
 
      pageBanner2();

      ?>
    </div>
    
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="checkSingle">
        <label class="form-check-label" for="checkSingle">文章條列式</label>
    </div>

 
    <div id="post-container">
      <?php
      
      $issinglemode = false;
      $thisfilter = "godfilter";
      $thisposttype = "god";
      // 設定 Cookie，名稱為 "user_preference"，值為 "dark_mode"，有效期為 30 天
      // setcookie($godfiltertype, "1", time() + 30 * 24 * 60 * 60, "/");

      if (isset($_COOKIE[$godfiltertype])) {
       //echo "Your type: " . $_COOKIE[$godfiltertype];
        if ($_COOKIE[$godfiltertype] == 1) {
          $issinglemode = true;
        }
      } else {
        //echo "No preference set.";
      }

       
      ?>

    </div>


  </div>




</div>







