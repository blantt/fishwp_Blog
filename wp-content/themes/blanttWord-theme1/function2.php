<?php
add_action('wp_ajax_my_custom_action', 'my_custom_action_callback');
add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_action_callback');

//這一行,是讓header呼叫wp_head()時,不自動顥示上方的工具003
add_filter('show_admin_bar', '__return_false');

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

            .dropdown-submenu > .dropdown-menu {
                top: 0;
                left: 100%; /* 讓子選單靠右對齊 */
                margin-top: -0.5rem; /* 微調位置 */
                display: none; /* 預設不顯示子選單 */
            }

            .dropdown-submenu:hover > .dropdown-menu {
                display: block; /* 滑鼠移入時顯示子選單 */
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
                        <li><a class="dropdown-item"  href="<?php echo esc_url(site_url('/my-momo?sch=短篇小說')); ?>">短篇小說集</a></li>
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
                    
                    <a href="<?php echo esc_url(site_url('/my-testmenu')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-bookmarks-fill"></i> testMenu2
                    </a>
 
                    <?php
                    // 在WordPress模板或自定义页面模板中
                    if (is_user_logged_in() == true) {
                        // 如果用户已登录，显示按钮
                        echo '<a href="' . esc_url(site_url('/my-amc')) . '" class="btn btn-outline-primary">';
                        echo '<i class="bi bi-egg-fried"></i>AMC</a>';
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


<?php


}
