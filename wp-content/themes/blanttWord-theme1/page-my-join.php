<div class="custom-login-page">
    <h1>用戶註冊</h1>
    <?php

    if (isset($_POST['submit_registration'])) {
        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];

        if (!username_exists($username) && !email_exists($email)) {
            // $user_id = wp_create_user($username, $password, $email);
            // wp_update_user(array(
            //     'ID' => $user_id,
            //     'role' => 'pending', // 設置為自定義角色
            // ));
            echo '<p>註冊成功，請等待管理員審核。</p>';
        } else {
            echo '<p>使用者名稱或電子郵件已存在。</p>';
        }
    }


    // 如果用戶已登入，顯示登出訊息或重定向
    if (is_user_logged_in()) {
        echo '<p>您已登入，<a href="' . esc_url(home_url()) . '">回到首頁</a> 或 <a href="' . esc_url(wp_logout_url(home_url())) . '">登出</a></p>';
    } else {
        // 顯示登入表單
    ?>
        <form method="post">
            <input type="text" name="username" placeholder="使用者名稱" required />
            <input type="email" name="email" placeholder="電子郵件" required />
            <input type="password" name="password" placeholder="密碼" required />
            <button type="submit" name="submit_registration">註冊</button>
        </form>
    <?php
        // $args = array(
        //     'redirect' => home_url(), // 登入後跳轉的頁面
        //     'form_id' => 'loginform',
        //     'label_username' => __('用戶名'),
        //     'label_password' => __('密碼'),
        //     'label_remember' => __('記住我'),
        //     'label_log_in' => __('登入'),
        //     'remember' => true,
        // );
        // wp_login_form($args);
    }
    ?>
</div>

<?php
