<div class="custom-login-page">
    <h1>用戶登入</h1>
    <?php
    // 如果用戶已登入，顯示登出訊息或重定向
    if (is_user_logged_in()) {
        echo '<p>您已登入，<a href="' . esc_url(home_url()) . '">回到首頁</a> 或 <a href="' . esc_url(wp_logout_url(home_url())) . '">登出</a></p>';
    } else {
        // 顯示登入表單
        $args = array(
            'redirect' => home_url(), // 登入後跳轉的頁面
            'form_id' => 'loginform',
            'label_username' => __('用戶名'),
            'label_password' => __('密碼'),
            'label_remember' => __('記住我'),
            'label_log_in' => __('登入'),
            'remember' => true,
        );
        wp_login_form($args);
    }
    ?>
</div>