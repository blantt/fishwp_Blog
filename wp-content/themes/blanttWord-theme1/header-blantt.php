 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

 <head>
     <meta charset="<?php bloginfo('charset'); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="profile" href="https://gmpg.org/xfn/11">
     <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
     <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
     <header class="custom-header">
         <div class="container">
             <div class="box2_col3">
                 <button onclick="window.location.href='<?php echo home_url(); ?>'">回首頁</button>
             </div>
             <!-- <h1 class="site-title"><?php bloginfo('name'); ?></h1> -->
             <h1>漫畫連載-黑板的秘密</h1>
             <!-- <p class="site-description"><?php bloginfo('description'); ?></p> -->
             <p>淡魚版權所有,其它用途,請先告知</p>
             <nav class="main-navigation">
                 <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
             </nav>
         </div>
     </header>
      <!-- aaa22 -->