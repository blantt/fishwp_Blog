<?php


//這裡設定小說自己的類別,對應momo
function register_level_momo() {
    // 設定標籤
    $labels = array(
        'name'              => '小說類別',
        'singular_name'     => '小說類別',
        'search_items'      => '搜尋小說類別',
        'all_items'         => '所有小說類別',
        'parent_item'       => '父級小說類別',
        'parent_item_colon' => '父級小說類別:',
        'edit_item'         => '編輯小說類別',
        'update_item'       => '更新小說類別',
        'add_new_item'      => '新增小說類別',
        'new_item_name'     => '新增小說類別名稱',
        'menu_name'         => '小說類別',
    );
  
    // 註冊分類法
    register_taxonomy('level_momo', 'momo', array(
        'labels' => $labels,
        'hierarchical' => true, // 設置為 true 使其支持分層結構
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'level_momo'),
    ));
  }
  add_action('init', 'register_level_momo');
  
  
  
  // 在自定義文章類型的管理頁面上添加篩選器
  function add_novel_category_filter() {
    $terms = get_terms(array(
      'taxonomy' => 'level_momo',
      'hide_empty' => false,
    )); 
  
    global $typenow;
    
    // 確保當前是在我們的自定義文章類型 'momo' 的管理頁面
    if ($typenow == 'momo') {
        $taxonomy = 'level_momo'; // 這裡是你自定義的分類法名稱
        $terms = get_terms($taxonomy);
        // echo '<div>篩選器已加載2</div>';
        // error_log('這是我的測試2: ' . print_r($terms, true));
        if ($terms && !is_wp_error($terms)) {
          // echo '<div>篩選器已加載3</div>';
            echo '<select name="' . $taxonomy . '" id="' . $taxonomy . '" class="postform">';
            echo '<option value="">' . __('所有小說類別') . '</option>';
            foreach ($terms as $term) {
                echo '<option value="' . $term->slug . '" ' . selected(isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '', $term->slug, false) . '>' . $term->name . '</option>';
            }
            echo '</select>';
        }
    }
  }
  add_action('restrict_manage_posts', 'add_novel_category_filter');
  
  // 根據篩選器的選擇過濾文章列表
  function filter_novel_category_query($query) {
    global $pagenow;
    $taxonomy = 'level_momo';
  
    if ($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'momo' && isset($_GET[$taxonomy]) && !empty($_GET[$taxonomy])) {
        $query->set('tax_query', array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $_GET[$taxonomy],
            ),
        ));
    }
  }
  add_action('pre_get_posts', 'filter_novel_category_query');
     
  add_action('init', function() {
    
     // error_log('這是我的測試: ' . print_r(get_object_taxonomies('momo'), true));
  }, 20);
  
//====momo 結束

  //TODO 自定義文章
function blantt_post_types() {
    
    register_post_type('note2', array(
      'show_in_rest' => true,
      'supports' => array('title', 'editor'),
      'public' => false,
      'show_ui' => true,
      'labels' => array(
        'name' => '心情筆記',
        'add_new_item' => '新增心情',
        'edit_item' => '編輯心情',
        'all_items' => 'All Notes2',
        'singular_name' => 'Notes2'
      ),
      'menu_icon' => 'dashicons-welcome-write-blog'
    ));
    
  }
  
  add_action('init', 'blantt_post_types');
   
  function blantt_AMC_post_types() {
    
    register_post_type('amc', array(
      'show_in_rest' => true,
      'supports' => array('title', 'editor'),
      'public' => true,
      'show_ui' => true,
      'labels' => array(
        'name' => 'amc',
        'add_new_item' => '新增AMC',
        'edit_item' => '編輯AMC',
        'all_items' => 'All AMC',
        'singular_name' => 'amc'
      ),
      'menu_icon' => 'dashicons-welcome-write-blog'
    ));
    
  }
  
  add_action('init', 'blantt_AMC_post_types');

  function books_custom_post_type() {
      /*
       * $labels 描述了文章類型的顯示方式。
       */
      $labels = array(
          'menu_name' => '漫畫', //選單第一層
          'name'          => '漫畫列表', // 列表頁標題
          'all_items' => '漫畫列表',		//子選單
          'singular_name' => 'books' ,  // 選單代稱
          'add_new' => '新增漫畫',			// 子選單
          'add_new_item' => '新增漫畫',	// 新增頁標題
          
      );
      /*
       * $supports 參數描述了文章類型支持的內容
       */
      $supports = array(
          // 'title',        // 文章標題
          // 'editor',       // 文章內容
          // 'excerpt',      // 允許簡短描述
          // 'author',       // 允許顯示和選擇作者
          // 'thumbnail',    // 允許精選圖片
          // 'comments',     // 啟用註釋
          // 'trackbacks',   // 支援引用
          // 'revisions',    // 顯示文章的自動保存版本
          // 'custom-fields' // 支援自定欄位
      );
      /*
       * $args 參數包含自定義文章類型的重要參數
       */
      $args = array(
          'labels'              => $labels,
          'description'         => '網頁與banner設計製作申請標單', // 說明
          'show_in_rest'        => true, // 是否要使用 Gutenberg 編輯，設為 false 為舊的編輯畫面
          'supports'            => $supports,
          'taxonomies'          => array('category'), // 允許 taxonomies 'category', 'post_tag'
          'hierarchical'        => false, // 允許分層分類，如果設置為 false，自定義帖子類型將表現得像文章，否則表現得像頁面
          'public'              => true,  // 公開文章類型
          'show_ui'             => true,  // 顯示此文章類型的界面
          'show_in_menu'        => true,  // 在管理菜單中顯示（左側面板）
          'show_in_nav_menus'   => true,  // 在外觀中顯示 -> 選單
          'show_in_admin_bar'   => true,  // 顯示在黑色管理欄
          // 'show_in_quick_edit' => false,
          'menu_position'       => 5,     // The position number in the left menu
          'menu_icon'           => 'dashicons-media-spreadsheet',  // The URL for the icon used for this post type
          'can_export'          => true,  // 允許使用工具導出內容 -> 導出
          'has_archive'         => true,  // 啟用文章類型存檔（按月、日或年）
          'exclude_from_search' => true, // 設置為true則前端搜索結果頁面不包含此類文章，設置為false則包含此類文章
          'publicly_queryable'  => true,  // 如果設置為 true，則允許在前端部分執行查詢
          'capability_type'     => 'post' // 允許像"Post"一樣讀取、編輯、刪除
      );
      register_post_type('books', $args); //創建一個帶有 slug 的文章類型是"books"和 $args 中的參數。
  }
  add_action('init', 'books_custom_post_type');  // ,0); menu位置最上方
  
  
  function momo_type() {
    /*
     * $labels 描述了文章類型的顯示方式。
     */
    $labels = array(
        'menu_name' => '小說', //選單第一層
        'name'          => '小說列表', // 列表頁標題
        'all_items' => '小說列表',		//子選單
        'singular_name' => 'momo' ,  // 選單代稱
        'add_new' => '新增小說',			// 子選單
        'add_new_item' => '新增小說',	// 新增頁標題
        
    );
    /*
     * $supports 參數描述了文章類型支持的內容
     */
    $supports = array(
        // 'title',        // 文章標題
        // 'editor',       // 文章內容
        // 'excerpt',      // 允許簡短描述
        // 'author',       // 允許顯示和選擇作者
        // 'thumbnail',    // 允許精選圖片
        // 'comments',     // 啟用註釋
        // 'trackbacks',   // 支援引用
        // 'revisions',    // 顯示文章的自動保存版本
        // 'custom-fields' // 支援自定欄位
    );
    /*
     * $args 參數包含自定義文章類型的重要參數
     */
    $args = array(
        'labels'              => $labels,
        'description'         => '小說創作園地', // 說明
        'show_in_rest'        => true, // 是否要使用 Gutenberg 編輯，設為 false 為舊的編輯畫面
        'supports'            => $supports,
        'taxonomies'          => array('category'), // 允許 taxonomies 'category', 'post_tag'
        'hierarchical'        => false, // 允許分層分類，如果設置為 false，自定義帖子類型將表現得像文章，否則表現得像頁面
        'public'              => true,  // 公開文章類型
        'show_ui'             => true,  // 顯示此文章類型的界面
        'show_in_menu'        => true,  // 在管理菜單中顯示（左側面板）
        'show_in_nav_menus'   => true,  // 在外觀中顯示 -> 選單
        'show_in_admin_bar'   => true,  // 顯示在黑色管理欄
        // 'show_in_quick_edit' => false,
        'menu_position'       => 5,     // The position number in the left menu
        'menu_icon'           => 'dashicons-media-spreadsheet',  // The URL for the icon used for this post type
        'can_export'          => true,  // 允許使用工具導出內容 -> 導出
        'has_archive'         => true,  // 啟用文章類型存檔（按月、日或年）
        'exclude_from_search' => true, // 設置為true則前端搜索結果頁面不包含此類文章，設置為false則包含此類文章
        'publicly_queryable'  => true,  // 如果設置為 true，則允許在前端部分執行查詢
        'capability_type'     => 'post' // 允許像"Post"一樣讀取、編輯、刪除
    );
    register_post_type('momo', $args); //創建一個帶有 slug 的文章類型是"books"和 $args 中的參數。
  }
    
  add_action('init', 'momo_type');  // ,0); menu位置最上方
  
  function register_menu_note() {
    register_post_type('note', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'public' => false,
        'show_ui' => true,
        'labels' => array(
          'name' => '軟體人生',
          'add_new_item' => '新增文章',
          'edit_item' => '編輯',
          'all_items' => 'All',
          'singular_name' => 'Note'
        ),
        'menu_icon' => 'dashicons-welcome-write-blog'
      ));
    
  }

  add_action('init', 'register_menu_note');  
  

