<?php

function my_theme_register_block() {
    wp_register_script(
        'my-theme-block-editor-script',
        get_template_directory_uri() . '/blocks/my-custom-block/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( get_template_directory() . '/blocks/my-custom-block/block.js' )
    );

    wp_register_style(
        'my-theme-block-editor-style',
        get_template_directory_uri() . '/blocks/my-custom-block/editor.css',
        array( 'wp-edit-blocks' ),
        filemtime( get_template_directory() . '/blocks/my-custom-block/editor.css' )
    );

    wp_register_style(
        'my-theme-block-style',
        get_template_directory_uri() . '/blocks/my-custom-block/style.css',
        array(),
        filemtime( get_template_directory() . '/blocks/my-custom-block/style.css' )
    );

    register_block_type( get_template_directory() . '/blocks/my-custom-block/block.json' );
}
add_action( 'init', 'my_theme_register_block' );



