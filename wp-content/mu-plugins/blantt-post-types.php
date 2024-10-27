<?php
//TODO 自定義文章
function blantt_post_types() {
  
  register_post_type('note2', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor'),
    'public' => false,
    'show_ui' => true,
    'labels' => array(
      'name' => 'Notes2',
      'add_new_item' => 'Add New Notes2',
      'edit_item' => 'Edit Notes2',
      'all_items' => 'All Notes2',
      'singular_name' => 'Notes2'
    ),
    'menu_icon' => 'dashicons-welcome-write-blog'
  ));

}

add_action('init', 'blantt_post_types');
 
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




