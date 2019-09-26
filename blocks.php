<?php

// Plugin Name: Blocks


define('BLOCKS_PLUGIN_DIR', '/wp-content/plugins/blocks');

require 'src/php/register_assets.php';
require 'src/php/register_block_category.php';
require 'src/php/register_blocks.php';



function remove_update_notifications($value) {
    unset($value->response['blocks/blocks.php']);
    return $value;
}
add_filter('site_transient_update_plugins', 'remove_update_notifications');

function register_template_for_pages() {
    $page = get_post_type_object('page');
    $page->template = [
        [
            'core/columns', [],
            [
                [
                    'core/column', [ 'width' => 70 ],
                    [
                        [
                            'core/cover', [ 'overlayColor' => 'light-gray' ],
                            [
                                [
                                    'core/paragraph', [ 'content' => 'Inhalt', 'fontSize' => 'large' ]
                                ]
                            ]
                        ],
                        [
                            'core/paragraph', [ 'content' => 'Hier folgt der Inhalt!' ]
                        ]
                    ]
                ],
                [
                    'core/column', [],
                    [
                        [
                            'core/cover', [ 'overlayColor' => 'primary' ],
                            [
                                [
                                    'core/paragraph', [ 'content' => 'Sidebar', 'fontSize' => 'large' ]
                                ]
                            ]
                        ],
                        [
                            'core/paragraph', [ 'content' => 'Das ist die rechte Spalte!' ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    $page->template_lock = 'all'; // Prevent inserting, moving and deleting
    $page->template_lock = 'insert'; // Prevent inserting and deleting, allow moving
}
//add_action('init', 'register_template_for_pages');
