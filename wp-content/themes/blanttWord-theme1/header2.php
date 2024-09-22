<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- 自引用的css -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.common.min.css">
  <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.default.min.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- ---自定義js========= -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- 引入 Kendo UI JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://kendo.cdn.telerik.com/2021.3.914/js/kendo.all.min.js"></script>


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- 内容置于右侧的 div -->
                <div style="text-align: right;">
                    <!-- 这里放置你想要右对齐的内容 -->

                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-emoji-laughing"></i> 魚的文章
                    </button>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-house"></i> Home
                    </a>
                    <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-bookmarks-plug"></i>My Notes
                    </a>
                    <a href="<?php echo esc_url(site_url('/my-notes2')); ?>" class="btn btn-outline-primary">
                        <i class="bi bi-egg-fried"></i>心情散文
                    </a>
                    <a href="<?php echo esc_url(site_url('/my-testmenu')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-bookmarks-fill"></i> testMenu
                    </a>

                    <a href="<?php echo esc_url(admin_url('/')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-bluetooth"></i> 控制台
                    </a>

                    <?php
                    // 在WordPress模板或自定义页面模板中
                    if (is_user_logged_in()==true) {
                        // 如果用户已登录，显示按钮
                        echo '<a href="' . esc_url(admin_url('/')) . '" class="btn btn-outline-success"><i class="bi bi-bluetooth"></i> 控制台</a>';
                        echo '<a href="' . esc_url(wp_registration_url()) . '" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>';
                       
                    } else {
                        // 可选：如果用户未登录，显示登录提示或不显示任何内容
                         
                        echo '<a href="' . esc_url(wp_login_url()) . ' class="btn btn--small btn--orange float-left push-right">Login</a>';
                    }
                   
                    ?>

 
                </div>
            </div>
        </div>

    </div>

  <header class="site-header" >
 
    <div class="container" >
      <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a></h1>
      <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation testbk">
          <ul>
            
             <li> <a href="<?php echo esc_url(site_url('/my-testHome')); ?>">測試Home2</a></li>
            <li> <a href="<?php echo esc_url(site_url('/my-test')); ?>">測試按鈕</a></li>

            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
            
          </ul>
        </nav>
        <div class="site-header__util">
            <h1>ddd</h1>
          <?php if (is_user_logged_in()) { ?>
            <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn--small btn--orange float-left push-right">My Notes</a>
            <a href="<?php echo wp_logout_url();  ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
              <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
              <span class="btn__text">Log Out</span>
            </a>
          <?php } else { ?>
            <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <?php } ?>

          <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>