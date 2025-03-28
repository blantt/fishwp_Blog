<?php
 require_once get_template_directory() . '/functionMenu.php';
 require_once get_template_directory() . '/function2.php';


 function my_theme_enqueue_scripts() {
  // 假設您的主題目錄中有一個名為 js 的資料夾，並且其中包含 ajax_functions.js 文件
  wp_enqueue_script('ajax-functions', get_template_directory_uri() . '/js/ajax_functions.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');
 
add_action('rest_api_init', 'blantt_api_del');
add_action('rest_api_init', 'blantt_api_edit');
add_action('rest_api_init', 'blantt_api_add');
function blantt_api_del() {
    register_rest_route('myplugin/v1', '/del/(?P<id>\d+)', array(
        'methods' => 'POST',
        'callback' => 'myplugin_del_callback',
    ));
}

function myplugin_del_callback($request) {
    $id = $request['id'];

    // 在這裡實現刪除資源的邏輯
    // 根據 $id 刪除相應的資源
    $deleted = wp_delete_post($id, true); // 第二個參數 true 表示永久刪除

    if ($deleted) {
        // 帖子成功刪除
        return new WP_REST_Response('OK', 200);
    } else {
        // 刪除失敗
        return new WP_Error('update_failed', 'Failed to update book', array('status' => 500));
    }
   
    
}

 


function blantt_api_edit() {
  register_rest_route('myplugin/v1', '/edit', array(
    'methods' => 'POST',
    'callback' => 'edit_callback',
 
   ));
};


function blantt_api_add() {
  register_rest_route('myplugin/v1', '/add', array(
    'methods' => 'POST',
    'callback' => 'add_callback',
 
   ));
};

function add_callback($request) {
    $post_author_id = 1;

    // 定義文章的內容，包括標題、內容和作者
    $new_post = array(
        'post_title'    => $request->get_param('title'),
        'post_content'  => $request->get_param('content'),
        'post_status'   => 'publish',  // 文章狀態：發布
        'post_type'     => 'note',      // 文章類型：文章
        'post_author'   => $post_author_id  // 文章作者的 ID
    );
    
    // 插入新文章
    $post_id = wp_insert_post($new_post);
    return new WP_REST_Response('ok', 200);
}

function edit_callback($request) {

  // 使用 WordPress 函數更新帖子
  $updated = wp_update_post(array(
      'ID' => $request->get_param('id'),
      'post_title' => $request->get_param('title'), // 更新標題
      'post_content' => $request->get_param('content'), // 更新內容
      // 可以根據您的需要更新其他帖子屬性
  ));

  if (is_wp_error($updated)) {
      return new WP_Error('update_failed', 'Failed to update book', array('status' => 500));
  }

  return new WP_REST_Response('OK', 200);

}



//---自定義


require get_theme_file_path('/inc/search-route.php');

function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}

add_action('rest_api_init', 'university_custom_rest');



function pageBanner($args = NULL) {
  
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
<?php }
//TDOD 引用自定義 
function university_files() {
 
  wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyDin3iGCdZ7RPomFLyb2yqFERhs55dmfTI', NULL, '1.0', true);
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css?v=2'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
  

  wp_enqueue_style('custom-style-fishStyle', get_template_directory_uri() . '/css/fishStyle.css');
  //wp_enqueue_style('blanttStyle1', get_theme_file_uri('/build/fishStyle.css?v=4'));
  //wp_enqueue_style('blanttStyle2', get_theme_file_uri('/build/fish_bootstrap.css?v=3'));
  wp_enqueue_style('custom-style-fish_bootstrap', get_template_directory_uri() . '/css/fish_bootstrap.css');
  wp_enqueue_style('blanttStyle3', get_theme_file_uri('/build/fishpage.css?v=2'));
  wp_localize_script('main-university-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));

  //wp_enqueue_script('bootstrapMenu', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js', NULL, '1.0', true);

}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('campus') AND $query->is_main_query()) {
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            ));
  }
}

add_action('pre_get_posts', 'university_adjust_queries');

function universityMapKey($api) {
  $api['key'] = 'yourKeyGoesHere';
  return $api;
}

add_filter('acf/fields/google_map/api', 'universityMapKey');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
  return get_bloginfo('name');
}



