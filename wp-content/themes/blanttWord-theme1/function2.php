<?php
add_action('wp_ajax_my_custom_action', 'my_custom_action_callback');
add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_action_callback');

//這一行,是讓header呼叫wp_head()時,不自動顥示上方的工具003
add_filter('show_admin_bar', '__return_false');

$GLOBALS['adminUser'] = "blanttfish@gmail.com";

// 在其他地方使用
echo $GLOBALS['ss1']; // 輸出: Hello World

function my_custom_action_callback()
{

    $func = $_POST['func'];
    // error_log($func);
    switch ($func) {
        case "approveOrder":
            // $OrderID = $_POST['OrderID'];

            // 执行您的逻辑，并返回响应
            echo '0'; // 示例成功响应
            wp_die();
            break;
        case "test2":
            $result = callRestApi2();
            header('Content-Type: application/json');
            echo json_encode($result);
            // echo $result; // 示例成功响应
            wp_die();
            break;
        case "C":
            echo "變數的值為 C";
            break;
        default:
            echo "變數的值不在 A、B、C 之間";
    }


    echo '0';
    wp_die(); // 必须调用 wp_die() 结束脚本执行


}


function htmlchange2($oldstr)
{
    $newstr = $oldstr;
    $newstr = str_replace("<br />", "", $newstr);
    $newstr = str_replace("<p>", "", $newstr);
    $newstr = str_replace("</p>", "", $newstr);
    return $newstr;
}

function callRestApi2()
{
    $apiUrl = "http://localhost/fish2/wp-json/wp/v2/note/";

    // 获取WordPress文章数据
    $response = file_get_contents($apiUrl);

    // 将JSON字符串解析为PHP数组3
    $notes = json_decode($response, true);

    // 如果获取数据成功
    if ($notes !== null) {
        // 创建一个新的数组来存储所需的信息
        $formattedNotes = array();

        // 遍历文章列表，提取所需的信息
        foreach ($notes as $note) {
            $id = $note['id'];
            $title = $note['title']['rendered'];
            $content = $note['content']['rendered'];
            $content = htmlchange2($content);
            // 将所需的信息组装成一个关联数组
            $formattedNote = array(
                'id' => $id,
                'title' => $title,
                'content' => $content
            );

            // 将文章信息添加到新的数组中
            $formattedNotes[] = $formattedNote;
        }

        // 将新的数组转换为JSON格式并输出
        return $formattedNotes;
    } else {
        // 如果获取数据失败，返回错误信息
        echo json_encode(array('error' => 'Failed to retrieve data from API.'));
    }
}



function callRestApi()
{
    $url = 'http://localhost/fish2/wp-json/wp/v2/note/';

    $response = wp_remote_get($url); // 使用WordPress提供的wp_remote_get函數發送HTTP GET請求

    if (is_wp_error($response)) {
        return 'Error: ' . $response->get_error_message();
    } else {
        $body = wp_remote_retrieve_body($response); // 取得API回應的內容
        $data = json_decode($body); // 解析JSON資料

        return $data; // 回傳解析後的JSON資料
    }
}


function blanttJs()
{
?>
    <!-- aa自引用的css -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- ---自定義js========= -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- 引入 Kendo UI JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2021.3.914/js/kendo.all.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        /* 設定子選單位置 */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            /* 讓子選單靠右對齊 */
            margin-top: -0.5rem;
            /* 微調位置 */
            display: none;
            /* 預設不顯示子選單 */
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
            /* 滑鼠移入時顯示子選單 */
        }
    </style>


<?php
}
//TODO 上方按鈕3
function pageBanner2()
{
    blanttJs();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- 内容置于右侧的 div -->
                <div style="text-align: right;">
                    <!-- 这里放置你想要右对齐的内容r -->



                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-house"></i> Home
                    </a>

                    <a class="btn btn-outline-success" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bookmarks-fill"> </i> 小說創作
                    </a>
                    <ul class="dropdown-menu">

                        <li class="dropdown-submenu">
                            <a class="dropdown-item" href="#">
                                長篇小說 <i class="fas fa-chevron-right"></i> <!-- 添加右箭頭圖標 -->
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo esc_url(site_url('/my-momo?sch=生命樹')); ?>">生命樹的願望</a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(site_url('/my-momo?sch=異夢')); ?>">異夢</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo esc_url(site_url('/my-momo?sch=短篇小說')); ?>">短篇小說集</a></li>
                    </ul>

                    <a href="<?php echo esc_url(site_url('/my-notes2')); ?>" class="btn btn-outline-primary">
                        <i class="bi bi-egg-fried"></i>心情散文
                    </a>
                    <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn-outline-primary">
                        <i class="bi bi-egg-fried"></i>軟體人生
                    </a>
                    <a href="<?php echo esc_url(site_url('/my-booklist')); ?>" class="btn btn-outline-primary">
                        <i class="bi bi-egg-fried"></i>連載漫畫
                    </a>


                    <?php
                    // 在WordPress模板或自定义页面模板中
                    if (is_user_logged_in() == true) {
                        // 如果用户已登录，显示按钮
                        echo '<a href="' . esc_url(site_url('/my-god')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>神學</a>';

                        echo '<a href="' . esc_url(site_url('/my-art')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>FishArt</a>';

                        echo '<a href="' . esc_url(site_url('/my-amc')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>AMC</a>';

                        echo '<a href="' . esc_url(site_url('/my-testmenu')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>testMenu2</a>';
                        echo '<a href="' . esc_url(admin_url('/')) . '" class="btn btn-outline-success"><i class="bi bi-bluetooth"></i> 控制台</a>';

                        echo '<a href="' . esc_url(wp_logout_url(home_url())) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>登出</a>';
                    } else {

                        echo '<a href="' . esc_url(site_url('/my-login')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>登入</a>';
                    }

                    ?>

                </div>
            </div>
        </div>

    </div>


<?php

}

//頁面按下文章分類,強制導向自己的頁面
add_action('template_redirect', function () {
    // 檢查是否為特定分類法的頁面
    $current_term = get_queried_object(); // 獲取當前分類物件
    $category_name = $current_term->name; // 如：旅行
    $category_slug = $current_term->slug; // 如：travel

    if ($current_term && isset($current_term->name)) {
        //  echo '目前分類: ' . $category_name;

        //exit;
    } else {
        // echo '無分類: ' ;
    }
    if (is_tax(taxonomy: 'amcfilter')) {

        // 跳轉到自訂頁面並附加分類資訊作為參數
        // wp_redirect(home_url('/page-my-amc.php?ss=' . urlencode($category_name)));
        wp_redirect(site_url('/my-amc?tag=' . urlencode($category_name)));
        exit;
    } elseif (is_tax(taxonomy: 'godfilter')) {
        wp_redirect(site_url('/my-god?tag=' . urlencode($category_name)));
        //echo '進來 itfilter'; 
        exit;
    } elseif (is_tax(taxonomy: 'itfilter')) {
        // echo '進來 itfilter';
        wp_redirect(site_url('/my-notes?tag=' . urlencode($category_name)));
        exit;
    } elseif (is_tax('artfilter')) {

        wp_redirect(site_url('/my-art?tag=' . urlencode($category_name)));
        exit;
    } elseif (is_tax('otherfilter')) {
        wp_redirect(site_url('/my-other-page'));
        exit;
    }
});

//開始處理文章分類和標籤
//得出文章內容,並且可以過濾分類(para=tag)
function get_filtered_posts($post_type, $taxonomy)
{
    // 從 URL 取得篩選條件（例如 ?tag=旅行）
    $category_name = isset($_GET['tag']) ? sanitize_text_field($_GET['tag']) : '';
    // echo 'go in' . $category_name ;
    // 建立 tax_query 條件
    $tax_query = array();
    if (!empty($category_name)) {
        $tax_query[] = array(
            'taxonomy' => $taxonomy,
            'field' => 'name',   // 根據名稱篩選
            'terms' => $category_name,
            'operator' => 'IN'
        );
    }
    $adiminUser = $GLOBALS['adminUser'];
    $current_user = wp_get_current_user();
    $loguseremail = '';
    // 判斷是否有登入使用者
    if ($current_user->ID != 0) {
        // 顯示使用者的名稱和電子郵件
        $loguseremail = esc_html($current_user->user_email);
    } else {
        $loguseremail = '';
    }

    if ($loguseremail != $adiminUser) {
        if ($taxonomy == 'itfilter') {
            // 強制排除 分類的條件
            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field' => 'name',     // 根據名稱篩選
                'terms' => '生涯規劃',      // 要排除的分類
                'operator' => 'NOT IN' // 排除指定的分類
            );
        }
        if ($taxonomy == 'mybook') {
            // 強制排除 分類的條件
            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field' => 'name',     // 根據名稱篩選
                'terms' => '魚的私房話',      // 要排除的分類
                'operator' => 'NOT IN' // 排除指定的分類
            );
        }
    }

    // 執行 WP_Query 並回傳結果
    $query = new WP_Query(array(
        'post_type' => $post_type,   // 自訂文章類型
        'posts_per_page' => -1,      // 取得所有符合條件的文章
        //'author' => get_current_user_id(), // 如需篩選目前使用者，可解除註解
        'tax_query' => $tax_query
    ));

    return $query; // 回傳 WP_Query 物件
}

 

// 顥示文章內容
function display_post($thisposttype,$thisfilter,  $singlemode = false)
{
    $userNotes = get_filtered_posts($thisposttype, $thisfilter);
    // 檢查是否有文章
    if ($userNotes->have_posts()) {
        while ($userNotes->have_posts()) {
            $userNotes->the_post();

            if ($singlemode) {
                echo '<h2><a href="' . get_permalink(get_the_ID()) . '">' . get_the_title() . '</a></h2>';
            } else {
                echo '<h2>' . get_the_title() . '</h2>';
                echo '<p class="date">Published on: ' . get_the_date() . '</p>';
                echo '<p class="categories">文章分類: ';
                the_terms(get_the_ID(), $thisfilter, '', ', ');
                echo '</p>';
                echo '<div class="content">' . apply_filters('the_content', get_the_content()) . '</div>';
            }

            // 為每篇文章創建一個包含標題、時間和內容的HTML結構2
            // echo '<div class="post">';
            // echo '<h2>' . get_the_title() . '</h2>';
            // echo '<p class="date">Published on: ' . get_the_date() . '</p>';
            // echo '<p class="categories">文章分類: ';
            // the_terms(get_the_ID(), $thisfilter, '', ', '); // 這裡改用 get_the_ID()
            // echo '</p>';
            // echo '<div class="content">' . apply_filters('the_content', get_the_content()) . '</div>';
            // echo '</div>'; 
            // 文章容器結束
        }
    } else {
        echo '<p>No notes found.</p>';
    }
}


/**
 * 顯示指定分類法的所有細項（分類項目）
 *
 * @param string $taxonomy 分類法名稱
 */
function display_taxonomy_terms($taxonomy)
{

    // 抓取指定分類法的所有細項
    $terms = get_terms(array(
        'taxonomy' => $taxonomy, // 動態指定分類法
        'hide_empty' => false    // 是否隱藏沒有文章的分類
    ));
    //$GLOBALS['adminUser']
    $adiminUser = "blanttfish@gmail.com";
    $current_user = wp_get_current_user();
    $loguseremail = '';
    // 判斷是否有登入使用者
    if ($current_user->ID != 0) {
        // 顯示使用者的名稱和電子郵件
        $loguseremail = esc_html($current_user->user_email);
    } else {
        $loguseremail = '';
    }

    if (!empty($terms) && !is_wp_error($terms)) {
        echo '<div class="box_container box_start" style="padding-bottom:8px;">';
        echo '<div style="padding-left:3px;">分類標籤:</div>';
        foreach ($terms as $term) {
            $tempname = $term->name;
            if ($adiminUser != $loguseremail) {
                if ($tempname == "生涯規劃") {
                    continue;
                }
                if ($tempname == "魚的私房話") {
                    continue;
                }
            }

            echo '<div style="padding-left:10px;">';
            echo '<a href="' . esc_url(get_term_link($term)) . '">';
            echo esc_html($tempname);
            echo '</a>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>目前沒有分類細項。</p>';
    }
}

add_action('init', function () {
    add_role('pending', '待審核', array('read' => true));
});
