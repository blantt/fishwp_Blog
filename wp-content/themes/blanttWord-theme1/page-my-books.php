<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <style>
         html, body {
            height: 100%;
            margin: 0;
        }

        #post-container {
            width: 90%;
            margin: 20px auto;
            /* 上下邊距為20px，左右自動（auto）以實現居中 */
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* 可選，增加陰影效果以突出容器 */
            background-color:rgba(248, 247, 247,0.9);
        }

        #post-container .post {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;

        }

        #post-container .post h2 {
            color: #333;
        }

        #post-container .post .date {
            color: #666;
            font-size: 0.85em;
        }

        #post-container .post .content {
            text-align: justify;
        }

        .mybk {
 
            background-image: url(<?php echo get_theme_file_uri('/images/noteback3.png') ?>);
             
            /* background-size: contain; */
            background-size: 100% auto;
            background-position: top center;
           
        }
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .custom-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
        }

        .custom-table td img {
            max-width: 100px;
            height: auto;
        }

        .custom-table td a {
            color: #0073aa;
            text-decoration: none;
        }

        .custom-table td a:hover {
            text-decoration: underline;
        }

        .custom-table .description {
            white-space: pre-wrap;
            /* Preserve white space and line breaks */
        }

        .custom-page-content{
            margin-top: 90px;
            background-color:rgba(248, 247, 247,0.8);
        }

    </style>
</head>
<?php
  get_header('empty');
     ?>
<body class="mybk">
    <?php

    pageBanner2();

    ?>
     <div class="custom-page-content">
        <h1>漫漫人生</h1>
        <table class="custom-table">
            <tr>
                <th></th>
                <th>書名</th>
                <th>內容</th>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/100" alt="Image 1"></td>
                <td> 
                  <a href="<?php echo esc_url(site_url('/books/黑板的秘密')); ?>">黑板的秘密</a></td>
                   
                </td>
                <td class="description">一個路痴少女和一個天才理工男相遇,共同破解了校園中流傳己久的靈異案件</td>
            </tr>
            <tr>
                <td><img src="https://via.placeholder.com/100" alt="Image 2"></td>
                <td><a href="https://example.com/article2">Article Title 2</a></td>
                <td class="description">This is a longer description for the second article. It also provides additional details and context about the article.</td>
            </tr>
        </table>
    </div>
</body>

</html>