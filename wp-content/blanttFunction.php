
//---自定義api=========

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
    $post_author_id = 0;

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
