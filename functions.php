<?php
// 基本設定 -----------------

function mytheme_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
  add_theme_support('wp-block-styles'); //グーテンベルグ由来のCSS
  add_theme_support('responsive-embeds'); //埋め込みコンテンツのレスポンシブ化
  add_theme_support('align-wide'); //幅広・全幅機能を有効化
  add_theme_support('editor-font-sizes', array(
    array(
      'name' => '小',
      'size' => '12.8',
      'slug' => 'small',
    ),
    array(
      'name' => '中',
      'size' => '16',
      'slug' => 'medium',
    ),
    array(
      'name' => '大',
      'size' => '20',
      'slug' => 'large',
    ),
  ));
  register_nav_menus(array(
    'primary' => 'メイン'
  ));
}
add_action('after_setup_theme', 'mytheme_setup');

// ウィジェット -----------------

function mytheme_widgets()
{
  register_sidebar(array(
    'id' => 'sidebar-1',
    'name' => 'サイドメニュー',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
  ));
}
add_action('widgets_init', 'mytheme_widgets');

// CSSとJSの読み込み -----------------

function mytheme_enqueue()
{
  // google fonts
  wp_enqueue_style('mytheme-googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,800', array(), null, all);
  // wp_enqueue_style('mytheme-style',get_stylesheet_uri());
  //編集用
  wp_enqueue_style('mytheme-style', get_stylesheet_uri(), array(), date('U'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');

//ブロック用のCSSとJSの読み込み
function mytheme_both()
{
  wp_enqueue_style(
    'mytheme-style-both',
    get_template_directory_uri() . '/style-both.css',
    array(),
    filemtime(get_template_directory() . '/style-boty.css')
  );
}
add_action('enqueue_block_assets', 'mytheme_both');

function myjs_enqueue()
{
  wp_enqueue_script(
    'myjs-style',
    get_template_directory_uri() . '/mystyle.js',
    array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
    filemtime(get_template_directory() . 'mystyle.js')
  );
}
add_action('enqueue_block_editor_assets', 'myjs_enqueue');

//LP:従来のスタイルのCSS,JS
function lp_custom()
{
  if (is_page('lp1')) {
    wp_enqueue_style(
      'lp-custom-css',
      get_template_directory_uri() . '/lp-custom/lp-custom.css',
      array(),
      filemtime(get_template_directory() . '/lp-custom/lp-custom.css')
    );
  }
}
add_action('wp_enqueue_scripts', 'lp_custom');

//LP:グーテンベルグ用のCSS,JS
function lp_guten_front()
{
  if (is_page('lpguten')) {
    wp_enqueue_style(
      'lp-guten-front-css',
      get_template_directory_uri() . '/lp-guten/lp-guten-front.css',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten-front.css')
    );
  }
}
add_action('wp_enqueue_scripts', 'lp_guten_front');

function lp_guten_both()
{
  global $post;
  if ($post->post_name == 'lpguten') {
    wp_enqueue_style(
      'lp-guten-both-css',
      get_template_directory_uri() . '/lp-guten/lp-guten-both.css',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten-both.css')
    );
  }
}
add_action('enqueue_block_assets', 'lp_guten_both');

function lp_guten_editor()
{
  global $post;
  if ($post->post_name == 'lpguten') {
    wp_enqueue_script(
      'lp-guten-js',
      get_template_directory_uri() . '/lp-guten/lp-guten.js',
      array(),
      filemtime(get_template_directory() . '/lp-guten/lp-guten.js')
    );
    // google fonts
    wp_enqueue_style('mytheme-googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,800', array(), null);
  }
}
add_action('enqueue_block_editor_assets', 'lp_guten_editor');


//グーテンベルグ由来のCSSを削除
// function remove_both_css(){
//   wp_deregister_style('wp-block-library');
//   wp_register_style('wp-block-library','');
//   wp_deregister_style('wp-block-library-theme');
//   wp_register_style('wp-block-library-theme','');
// }
// add_action('enqueue_block_assets','remove_both_css');

// 新規追加した投稿にブロックテンプレートを表示する
// function mytheme_temp(){
//   $obj = get_post_type_object('post');
//   $obj -> template_lock = 'all';//表示をロックしたいとき
//   $obj -> template = array(
//     array(
//       'core/heading',
//       array(
//         'level'=>'2',
//         'content'=>'基本情報',
//       )
//     ),
//     array(
//       'core/paragraph',
//       array(
//         'placeholder'=>'ここに文章を入力してください。'
//       )
//     ),
//     array(
//       'core/image'
//     ),
//   );
// }
// add_action('init','mytheme_temp');

// ショートコード  -----------------

add_shortcode('url', 'shortcode_url');
function shortcode_tp($atts, $content = '')
{
  return get_template_directory_uri() . $content;
}
