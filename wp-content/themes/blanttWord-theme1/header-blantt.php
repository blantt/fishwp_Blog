 <!DOCTYPE html>
 <html <?php language_attributes(); ?>>

 <head>
     <meta charset="<?php bloginfo('charset'); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="profile" href="https://gmpg.org/xfn/11">
     <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

     <style>
        .bb{
            padding-left: 50px;
        }

        .ft1{
          font-size:24px;
          font-weight: 600;
          padding-top: 10px;
          color: rgb(53, 89, 170);

        }

       .ft2{
           padding-left: 10px;
           padding-top: 5px;
        }

        table td{
            padding : 10px;
              
        }
        table td a {
            color: rgb(53, 89, 170);

        }

     </style>

     <?php wp_head(); ?>
 </head>

 <body <?php body_class(); ?>>
       <div class="box_container box_column">

            <div class="box_container boxrow box_start" style=" padding-top:10px;  ">
                    <div style="width:10px">

                    </div>

                    <div class="box2_col3" >
                        <button onclick="window.location.href='<?php echo esc_url(site_url('/my-booklist')); ?>'">回漫畫首頁</button>
                    </div>
            </div>
            <div class="box_item boxrow" style=" padding-left: 50px;">
                <div class="box_item box_column">
                    <div class="ft1">
                       漫畫連載-黑板的秘密
                    </div>
                    <div class="ft2">
                        淡魚版權所有,其它用途,請先告知
                    </div>
                    <div style="padding-left: 10px">
                        <table>
                            <tr>
                                <td>
                                    
                                   <a href="<?php echo esc_url(site_url('/books/黑板的秘密')); ?>">
                                     第一話:校園迷航</a>
                                </td>
                                 <td>
                                 <a href="<?php echo esc_url(site_url('/books/黑板的秘密-第二話')); ?>">
                                    第二話:天使</a>
                                </td>

                            </tr>
                            
                        </table>

                    </div> 


                </div>
               
            </div>
            

       </div>

      
      