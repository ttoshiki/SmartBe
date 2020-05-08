<?php


// 言語ファイル --------------------------------------------------------------------------------
load_textdomain('tcd-w', get_template_directory().'/languages/' . get_locale() . '.mo');


// hook wp_head --------------------------------------------------------------------------------
require get_template_directory() . '/functions/head.php';


// テーマオプション --------------------------------------------------------------------------------
require get_template_directory() . '/admin/theme-options.php';


// コンテンツビルダー --------------------------------------------------------------------------------
require get_template_directory() . '/admin/contents_builder.php';


// 更新通知 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/update_notifier.php';


// Javascriptの読み込み -----------------------------------------------------------------------
function my_admin_scripts()
{
    wp_enqueue_script('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('imgareaselect');
    wp_enqueue_script('jquery-ui-draggable');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('ml-widget-js', get_template_directory_uri().'/widget/js/script.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery.cookieTab', get_template_directory_uri().'/admin/js/jquery.cookieTab.js', array(), '1.0.0', true);
    wp_enqueue_script('my_script', get_template_directory_uri().'/admin/js/my_script.js', array(), '1.4.0', true);

    // 画像アップロード用
    wp_enqueue_media();
    wp_enqueue_script('cf-media-field', get_template_directory_uri().'/admin/js/cf-media-field.js', array(), '1.0.0', true);
    wp_localize_script('cf-media-field', 'cfmf_text', array(
        'image_title' => __('Please Select Image', 'tcd-w'),
        'image_button' => __('Use this Image', 'tcd-w'),
        'video_title' => __('Please Select Video', 'tcd-w'),
        'video_button' => __('Use this Video', 'tcd-w')
    ));

    wp_enqueue_script('wp-color-picker'); // WPカラーピッカー
}
add_action('admin_print_scripts', 'my_admin_scripts');


// スタイルシートの読み込み -----------------------------------------------------------------------
function my_admin_styles()
{
    wp_enqueue_style('thickbox');
    wp_enqueue_style('my_widget_css', get_template_directory_uri() . '/widget/css/style.css');
    wp_enqueue_style('my_admin_css', get_template_directory_uri() .'/admin/css/my_admin.css');
    wp_enqueue_style('wp-color-picker'); // WPカラーピッカー
}
add_action('admin_print_styles', 'my_admin_styles');


// ビジュアルエディタ用スタイルシートの読み込み --------------------------------------------------------------------------------
function wpdocs_theme_add_editor_styles()
{
    add_editor_style('editor-style-02.css');//管理画面用のスタイルシートを変更した場合は、ファイルの名前と番号を変える （キャッシュ対策）
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');


// ページビルダー --------------------------------------------------------------------------------
require get_template_directory() . '/pagebuilder/pagebuilder.php';


// おすすめ記事 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/recommend.php';


// meta title meta description --------------------------------------------------------------------------------
require get_template_directory() . '/functions/seo.php';


// 管理画面の記事一覧、クイック編集 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/admin_column.php';
require get_template_directory() . '/functions/quick_edit.php';


// ページ用カスタムフィールド --------------------------------------------------------------------------------
require get_template_directory() . '/functions/page_cf.php';
require get_template_directory() . '/functions/page_cf2.php';


// 紹介用カスタムフィールド --------------------------------------------------------------------------------
require get_template_directory() . '/functions/introduce_cf.php';
require get_template_directory() . '/functions/introduce_cf2.php';


// カテゴリー用カスタムフィールド --------------------------------------------------------------------------------
require get_template_directory() . '/functions/category.php';


// 閲覧数カスタムフィールド・カウントアップ --------------------------------------------------------------------------------
require get_template_directory() . '/functions/view_count.php';


// カスタムCSS --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_css.php';


// ビジュアルエディタにクイックタグを追加 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_editor.php';


// ショートコード --------------------------------------------------------------------------------
require get_template_directory() . '/functions/short_code.php';


// ウィジェット ------------------------------------------------------------------------
require get_template_directory() . '/widget/ad.php';
require get_template_directory() . '/widget/styled_post_list1.php';
require get_template_directory() . '/widget/google_search.php';
require get_template_directory() . '/widget/archive_list.php';
require get_template_directory() . '/widget/banner_list.php';
require get_template_directory() . '/widget/icon_link_list.php';
require get_template_directory() . '/widget/ranking_list.php';


// カスタムページリンク --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_page_link.php';


// OGP tag -------------------------------------------------------------------------------------------
require get_template_directory() . '/functions/ogp.php';


// 次のページリンク --------------------------------------------------------------------------------
require get_template_directory() . '/functions/next_prev.php';


// ロゴ用関数 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/logo.php';


// パスワード保護 --------------------------------------------------------------------------------
require(get_template_directory() . '/functions/password_form.php');


// カスタム検索 --------------------------------------------------------------------------------
require get_template_directory() . '/functions/custom_search.php';


// ビジュアルエディタに表(テーブル)の機能を追加 -----------------------------------------------
function mce_external_plugins_table($plugins)
{
    $plugins['table'] = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.4/plugins/table/plugin.min.js';
    return $plugins;
}
add_filter('mce_external_plugins', 'mce_external_plugins_table');

// tinymceのtableボタンにclass属性プルダウンメニューを追加
function mce_buttons_table($buttons)
{
    $buttons[] = 'table';
    return $buttons;
}
add_filter('mce_buttons', 'mce_buttons_table');

function bootstrap_classes_tinymce($settings)
{
    $styles = array(
        array('title' => __('Default style', 'tcd-w'), 'value' => ''),
        array('title' => __('No border', 'tcd-w'), 'value' => 'table_no_border'),
        array('title' => __('Display only horizontal border', 'tcd-w'), 'value' => 'table_border_horizontal')
    );
    $settings['table_class_list'] = json_encode($styles);
    return $settings;
}
add_filter('tiny_mce_before_init', 'bootstrap_classes_tinymce');


// ユーザーエージェントを判定するための関数---------------------------------------------------------------------
function is_mobile()
{
    //タブレットも含める場合はwp_is_mobile()

    $ua = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'BlackBerry', // BlackBerry
        'BB10', // BlackBerry10
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );

    $pattern = '/' . implode('|', $ua) . '/i';
    $match = preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);

    if ($match) {
        return true;
    } else {
        return false;
    }
}


// レスポンシブOFF機能を判定するための関数---------------------------------------------------------------------
function is_no_responsive()
{
    global $dp_options;
    if (! $dp_options) {
        $dp_options = get_desing_plus_option();
    }

    if ($dp_options['responsive'] == 'no') {
        return true;
    } else {
        return false;
    }
}


// スクリプトのバージョン管理 ----------------------------------------------------------------------------------------------
function version_num()
{
    if (function_exists('wp_get_theme')) {
        $theme_data = wp_get_theme();
    } else {
        $theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
    }
    return $theme_data['Version'];
}


// ウィジェットの設定 ------------------------------------------------------------------------------
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Basic side widget', 'tcd-w'),
        'description' => __('If there is no individual setting, this widget will be displayed.', 'tcd-w'),
        'id' => 'common_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Post side widget', 'tcd-w'),
        'id' => 'post_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Archive side widget', 'tcd-w'),
        'id' => 'archive_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Page side widget', 'tcd-w'),
        'id' => 'page_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('News side widget', 'tcd-w'),
        'id' => 'news_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Introduce side widget', 'tcd-w'),
        'id' => 'introduce_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Search results side widget', 'tcd-w'),
        'id' => 'search_results_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget footer_widget %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="footer_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Footer widget', 'tcd-w'),
        'id' => 'footer_widget'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Basic side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'common_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Post side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'post_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Archive side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'archive_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Page side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'page_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('News side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'news_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Introduce side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'introduce_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget side_widget clearfix %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Search results side widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'search_results_widget_mobile'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="widget footer_widget %2$s" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="footer_headline rich_font">',
        'after_title' => "</h3>\n",
        'name' => __('Footer widget (mobile)', 'tcd-w'),
        'description' => __('This widget will be replaced with normal widget when a user accesses the site by smartphone.', 'tcd-w'),
        'id' => 'footer_widget_mobile'
    ));
}

// オリジナルの抜粋記事 --------------------------------------------------------------------------------
function new_excerpt($a, $echo = true)
{
    if (has_excerpt()) {
        $base_content = get_the_excerpt();
        $base_content = str_replace(array("\r\n", "\r", "\n"), "", $base_content);
        $trim_content = mb_strimwidth($base_content, 0, $a, '…', 'utf-8');
    } else {
        $base_content = get_the_content();
        $base_content = preg_replace('!<style.*?>.*?</style.*?>!is', '', $base_content);
        $base_content = preg_replace('!<script.*?>.*?</script.*?>!is', '', $base_content);
        $base_content = preg_replace('/\[.+\]/', '', $base_content);
        $base_content = str_replace(array("\r\n", "\r", "\n" , "&nbsp;"), "", $base_content);
        $base_content = strip_tags($base_content);
        $trim_content = mb_strimwidth($base_content, 0, $a, '…', 'utf-8');
        $trim_content = str_replace(array("\r\n", "\r", "\n" , "&nbsp;"), "", $trim_content);
        $trim_content = str_replace(']]>', ']]&gt;', $trim_content);
        $trim_content = htmlspecialchars($trim_content);
    }

    if ($echo) {
        echo $trim_content;
    } else {
        return $trim_content;
    }
}

//抜粋からPタグを取り除く
remove_filter('the_excerpt', 'wpautop');


// 記事タイトルの文字数制限 --------------------------------------------------------------------------------
function trim_title($num)
{
    $base_title = get_the_title();
    $trim_title = mb_substr($base_title, 0, $num, "utf-8");
    $count_title = mb_strlen($trim_title, "utf-8");
    if ($count_title > $num-1) {
        echo $trim_title . '…';
    } else {
        echo $trim_title;
    }
}


// タイトルをエンコード --------------------------------------------------------------------------------
function get_encoded_title($title)
{
    return urlencode(mb_convert_encoding($title, "UTF-8"));
}


// セルフピンバックを禁止する -------------------------------------------------------------------------------------
function no_self_ping(&$links)
{
    $home = home_url();
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) {
            unset($links[$l]);
        }
    }
}
add_action('pre_ping', 'no_self_ping');


// RSS用のフィードを追加 ---------------------------------------------------------------------------------------------------
add_theme_support('automatic-feed-links');


//　ヘッダーから余分なMETA情報を削除 --------------------------------------------------------------------
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


// 固定ページからアイキャッチ用meta boxを削除 -----------------------------------------------------------
function remove_image_metabox_from_page()
{
    remove_meta_box('postimagediv', 'page', 'side');
}
add_action('do_meta_boxes', 'remove_image_metabox_from_page');


// インラインスタイルを取り除く --------------------------------------------------------------------------------
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ));
}
add_action('widgets_init', 'remove_recent_comments_style');

function remove_adminbar_inline_style()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_adminbar_inline_style');


//　サムネイルの設定 --------------------------------------------------------------------------------
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(860, 0, false);
    add_image_size('size1', 150, 150, true); // styled_post_list1ウィジェットで利用 画質対策で100x100の1.5倍
    add_image_size('size2', 336, 216, true); // 記事一覧・関連記事で利用 画質対策で280x180の1.2倍
    add_image_size('size3', 336, 336, true); // トップページで利用 画質対策で280x280の1.2倍
    add_image_size('size4', 516, 192, true); // 紹介詳細の紹介一覧バナーで利用 画質対策で430x160の1.2倍
    // imgタグのsrcsetを未使用に
    add_filter('wp_calculate_image_srcset', '__return_false');
}


// カスタムメニューの設定 --------------------------------------------------------------------------------
if (function_exists('register_nav_menu')) {
    register_nav_menu('global-menu', __('Global menu', 'tcd-w'));
    register_nav_menu('footer-bottom-menu', __('Footer bottom menu', 'tcd-w'));
}


// ページナビ用 --------------------------------------------------------------------------------
function show_posts_nav()
{
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}


// 絵文字を消す ------------------------------------------------------------------
function disable_emoji()
{
    global $dp_options;
    if (! $dp_options) {
        $dp_options = get_desing_plus_option();
    }
    if ($dp_options['use_emoji'] == 0) {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }
}
add_action('init', 'disable_emoji');


// bodyタグにclassを追加 --------------------------------------------------------------------------------
function ml_body_classes($classes)
{
    global $dp_options, $header_slider, $custom_search_vars;
    if (! $dp_options) {
        $dp_options = get_desing_plus_option();
    }

    if ($dp_options['header_fix'] == 'type2') {
        $classes[] = 'fix_top';
    }

    if ($dp_options['mobile_header_fix'] == 'type2') {
        $classes[] = 'mobile_fix_top';
    }

    if (is_singular($dp_options['news_slug']) && $dp_options['news_slug'] != 'news') {
        $classes[] = 'single-news';
    }

    if (is_singular($dp_options['introduce_slug']) && $dp_options['introduce_slug'] != 'introduce') {
        $classes[] = 'single-introduce';
    }

    if (is_mobile()) {
        $classes[] = 'mobile_device';
        if ($dp_options['footer_bar_display'] == 'type1' || $dp_options['footer_bar_display'] == 'type2') {
            $classes[] = 'mobile_footer_bar';
        }
    }

    if ($header_slider) {
        $classes[] = 'has_header_content';
    }

    if (is_front_page()) {
        // 設定によりトップページで検索結果が表示される対策
        if ($custom_search_vars) {
            $classes[] = 'home-search_results';
        } else {
            $classes[] = 'home-default';
        }
    } elseif ($custom_search_vars) {
        $classes[] = 'search-results';
    }

    return array_unique($classes);
}
add_filter('body_class', 'ml_body_classes');
add_filter('body_class', 'add_page_slug_class_name');
function add_page_slug_class_name($classes)
{
    if (is_page()) {
        $page = get_post(get_the_ID());
        $classes[] = $page->post_name;
    }
    return $classes;
}


// RGBをHEXに変換 ------------------------------------------------------------------
function hex2rgb($hex)
{
    $hex = str_replace("#", "", $hex);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    return array($r, $g, $b);
}

// カテゴリーラベル変更
function change_post_menu_label()
{
    $dp_options = get_desing_plus_option();
    global $submenu;
    $submenu['edit.php'][15][0] = $dp_options['category_label'];
}
function change_taxonomies_object_label()
{
    $dp_options = get_desing_plus_option();
    global $wp_taxonomies;
    $labels = $wp_taxonomies['category']->labels;
    $labels->name = $dp_options['category_label'];
}
add_action('init', 'change_taxonomies_object_label');
add_action('admin_menu', 'change_post_menu_label');

// カスタム投稿タイプ・カスタムタクソノミー ------------------------------------------------------------------
if (function_exists('register_post_type')) {
    function gensen_register_post_type()
    {
        $dp_options = get_desing_plus_option();

        // カテゴリー2～3
        for ($i = 2; $i <= 3; $i++) {
            if ($dp_options['use_category'.$i]) {
                register_taxonomy(
                    $dp_options['category'.$i.'_slug'],
                    'post',
                    array(
                        'label' => $dp_options['category'.$i.'_label'],
                        'labels' => array(
                            'name' => $dp_options['category'.$i.'_label'],
                            'singular_name' => $dp_options['category'.$i.'_label'],
                            'search_items' => __('Search Category', 'tcd-w'),
                            'popular_items' => __('Popular Category', 'tcd-w'),
                            'all_items' => __('All Category', 'tcd-w'),
                            'parent_item' => __('Parent Category', 'tcd-w'),
                            'edit_item' => __('Edit Category', 'tcd-w'),
                            'update_item' => __('Update Category', 'tcd-w'),
                            'add_new_item' => __('Add New Category', 'tcd-w'),
                            'new_item_name' => __('Name Of New Category', 'tcd-w'),
                        ),
                        'public' => true,
                        'show_ui' => true,
                        'show_admin_column' => true,
                        'hierarchical' => true,
                    )
                );
            }
        }

        // 管理画面のタグをカテゴリー2～3の後ろに表示させる
        if (is_admin()) {
            global $wp_taxonomies;
            if (isset($wp_taxonomies['post_tag'])) {
                $post_tag = $wp_taxonomies['post_tag'];
                unset($wp_taxonomies['post_tag']);
                $wp_taxonomies['post_tag'] = $post_tag;
            }
        }

        // カスタム投稿 紹介
        register_post_type($dp_options['introduce_slug'], array(
            'label' => $dp_options['introduce_label'],
            'labels' => array(
                'name' => $dp_options['introduce_label'],
                'singular_name' => $dp_options['introduce_label'],
                'add_new' => __('Add New', 'tcd-w'),
                'add_new_item' => __('Add New Item', 'tcd-w'),
                'edit_item' => __('Edit', 'tcd-w'),
                'new_item' => __('New item', 'tcd-w'),
                'view_item' => __('View Item', 'tcd-w'),
                'search_items' => __('Search Items', 'tcd-w'),
                'not_found' => __('Not Found', 'tcd-w'),
                'not_found_in_trash' => __('Not found in trash', 'tcd-w'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'menu_position' => 5,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail')
        ));

        // 紹介カテゴリー1～3
        for ($i = 1; $i <= 3; $i++) {
            if ($dp_options['use_introduce_category'.$i]) {
                register_taxonomy(
                    $dp_options['introduce_category'.$i.'_slug'],
                    $dp_options['introduce_slug'],
                    array(
                        'label' => $dp_options['introduce_category'.$i.'_label'],
                        'labels' => array(
                            'name' => $dp_options['introduce_category'.$i.'_label'],
                            'singular_name' => $dp_options['introduce_category'.$i.'_label'],
                            'search_items' => __('Search Category', 'tcd-w'),
                            'popular_items' => __('Popular Category', 'tcd-w'),
                            'all_items' => __('All Category', 'tcd-w'),
                            'parent_item' => __('Parent Category', 'tcd-w'),
                            'edit_item' => __('Edit Category', 'tcd-w'),
                            'update_item' => __('Update Category', 'tcd-w'),
                            'add_new_item' => __('Add New Category', 'tcd-w'),
                            'new_item_name' => __('Name Of New Category', 'tcd-w'),
                        ),
                        'public' => true,
                        'show_ui' => true,
                        'show_admin_column' => true,
                        'hierarchical' => true,
                    )
                );
            }
        }

        // 紹介タグ
        if ($dp_options['use_introduce_tag']) {
            register_taxonomy($dp_options['introduce_tag_slug'], $dp_options['introduce_slug'], array(
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'capabilities' => array(
                    'manage_terms' => 'manage_post_tags',
                    'edit_terms'   => 'edit_post_tags',
                    'delete_terms' => 'delete_post_tags',
                    'assign_terms' => 'assign_post_tags',
                )
            ));
        }

        // カスタム投稿 お知らせ
        register_post_type($dp_options['news_slug'], array(
            'label' => $dp_options['news_label'],
            'labels' => array(
                'name' => $dp_options['news_label'],
                'singular_name' => $dp_options['news_label'],
                'add_new' => __('Add New', 'tcd-w'),
                'add_new_item' => __('Add New Item', 'tcd-w'),
                'edit_item' => __('Edit', 'tcd-w'),
                'new_item' => __('New item', 'tcd-w'),
                'view_item' => __('View Item', 'tcd-w'),
                'search_items' => __('Search Items', 'tcd-w'),
                'not_found' => __('Not Found', 'tcd-w'),
                'not_found_in_trash' => __('Not found in trash', 'tcd-w'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'menu_position' => 5,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail')
        ));

        // 紹介 表示件数
        function pre_get_posts_introduce($wp_query)
        {
            $dp_options = get_desing_plus_option();
            if (! is_admin() && $wp_query->is_main_query()) {
                if (
                    $wp_query->is_post_type_archive($dp_options['introduce_slug']) ||
                    ($wp_query->is_tax($dp_options['introduce_category1_slug']) && $dp_options['use_introduce_category1'] && $dp_options['use_introduce_category1_introduce_archive']) ||
                    ($wp_query->is_tax($dp_options['introduce_category2_slug']) && $dp_options['use_introduce_category2'] && $dp_options['use_introduce_category2_introduce_archive']) ||
                    ($wp_query->is_tax($dp_options['introduce_category3_slug']) && $dp_options['use_introduce_category3'] && $dp_options['use_introduce_category3_introduce_archive'])
                ) {
                    $wp_query->set('posts_per_page', $dp_options['archive_introduce_num']);
                }
            }
        }
        add_filter('pre_get_posts', 'pre_get_posts_introduce');

        // テンプレートファイル差し替え
        function custom_post_type_template_include($template)
        {
            // カスタム検索用グローバル変数
            global $custom_search_vars;

            global $dp_options;
            if (! $dp_options) {
                $dp_options = get_desing_plus_option();
            }

            $template_name = null;

            if (is_singular($dp_options['news_slug'])) {
                $template_name = 'single-news.php';
            } elseif (is_singular($dp_options['introduce_slug'])) {
                $template_name = 'single-introduce.php';
            } elseif ($custom_search_vars) {
                // カスタム検索の場合はcustom_search.phpで処理されるため何もしない
            } elseif (is_post_type_archive($dp_options['news_slug'])) {
                $template_name = 'archive-news.php';
            } elseif (
                is_post_type_archive($dp_options['introduce_slug']) ||
                (is_tax($dp_options['introduce_category1_slug']) && $dp_options['use_introduce_category1'] && $dp_options['use_introduce_category1_introduce_archive']) ||
                (is_tax($dp_options['introduce_category2_slug']) && $dp_options['use_introduce_category2'] && $dp_options['use_introduce_category2_introduce_archive']) ||
                (is_tax($dp_options['introduce_category3_slug']) && $dp_options['use_introduce_category3'] && $dp_options['use_introduce_category3_introduce_archive'])
            ) {
                $template_name = 'archive-introduce.php';
            } elseif (is_category() || is_tax(array( $dp_options['category2_slug'], $dp_options['category3_slug'], $dp_options['introduce_category1_slug'], $dp_options['introduce_category2_slug'], $dp_options['introduce_category3_slug'] ))) {
                $template_name = 'custom_search_results.php';
            }

            if ($template_name) {
                if (file_exists(STYLESHEETPATH . '/' . $template_name)) {
                    return STYLESHEETPATH . '/' . $template_name;
                } elseif (file_exists(TEMPLATEPATH . '/' . $template_name)) {
                    return TEMPLATEPATH . '/' . $template_name;
                }
            }

            return $template;
        }
        add_filter('template_include', 'custom_post_type_template_include');
    }
    add_action('init', 'gensen_register_post_type');
}



// カードリンクパーツ --------------------------------------------------------------------------------------
add_image_size('size-card', 150, 150, true);

function get_the_custom_excerpt($content, $length)
{
    $length = ($length ? $length : 70);//デフォルトの長さを指定する
    $content = preg_replace('/<!--more-->.+/is', "", $content); //moreタグ以降削除
    $content = strip_shortcodes($content);//ショートコード削除
    $content = strip_tags($content);//タグの除去
    $content = str_replace("&nbsp;", "", $content);//特殊文字の削除（今回はスペースのみ）
    $content = mb_substr($content, 0, $length);//文字列を指定した長さで切り取る
    return $content.'...';
}

//カードリンクショートコード
function clink_scode($atts)
{
    extract(shortcode_atts(array(
        'url'=>"",
        'title'=>"",
        'excerpt'=>""
    ), $atts));

    $id = url_to_postid($url);//URLから投稿IDを取得
    $post = get_post($id);//IDから投稿情報の取得
    $date = mysql2date('Y.m.d', $post->post_date);//投稿日の取得

    $img_width ="120";//画像サイズの幅指定
    $img_height = "120";//画像サイズの高さ指定
    $no_image = get_template_directory_uri().'/img/common/no_image1.gif';

    //抜粋を取得
    if (empty($excerpt)) {
        if ($post->post_excerpt) {
            $excerpt = get_the_custom_excerpt($post->post_excerpt, 145);
        } else {
            $excerpt = get_the_custom_excerpt($post->post_content, 145);
        }
    }

    //タイトルを取得
    if (empty($title)) {
        $title = esc_html(get_the_title($id));
    }
    //アイキャッチ画像を取得
    if (has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'size-card');
        $img_tag = "<img src='" . $img[0] . "' alt='{$title}' width=" . $img_width . " height=" . $img_height . " />";
    } else {
        $img_tag ='<img src="'.$no_image.'" alt="" width="'.$img_width.'" height="'.$img_height.'" />';
    }

    $clink ='<div class="cardlink"><a href="'. $url .'"><div class="cardlink_thumbnail">'. $img_tag .'</a></div><div class="cardlink_content"><span class="timestamp">'.$date.'</span><div class="cardlink_title"><a href="'. $url .'">'. $title .' </a></div><div class="cardlink_excerpt">' . $excerpt . '</div></div><div class="cardlink_footer"></div></div>';

    return $clink;
}
add_shortcode("clink", "clink_scode");


// カスタムコメント --------------------------------------------------------------------------------------

if (function_exists('wp_list_comments')) {
    // comment count
    add_filter('get_comments_number', 'comment_count', 0);
    function comment_count($commentcount)
    {
        global $id;
        $_commnets = get_comments('post_id=' . $id);
        $comments_by_type = separate_comments($_commnets);
        return count($comments_by_type['comment']);
    }
}


function custom_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    global $commentcount;
    if (!$commentcount) {
        $commentcount = 0;
    } ?>

 <li class="comment <?php if ($comment->comment_author_email == get_the_author_meta('email')) {
        echo 'admin-comment';
    } else {
        echo 'guest-comment';
    } ?>" id="comment-<?php comment_ID() ?>">
  <div class="comment-meta clearfix">
   <div class="comment-meta-left">
  <?php if (function_exists('get_avatar') && get_option('show_avatars')) {
        echo get_avatar($comment, 35);
    } ?>

    <ul class="comment-name-date">
     <li class="comment-name">
<?php if (get_comment_author_url()) : ?>
<a id="commentauthor-<?php comment_ID() ?>" class="url <?php if ($comment->comment_author_email == get_the_author_meta('email')) {
        echo 'admin-url';
    } else {
        echo 'guest-url';
    } ?>" href="<?php comment_author_url() ?>" rel="nofollow">
<?php else : ?>
<span id="commentauthor-<?php comment_ID() ?>">
<?php endif; ?>

<?php comment_author(); ?>

<?php if (get_comment_author_url()) : ?>
</a>
<?php else : ?>
</span>
<?php endif; ?>
     </li>
     <li class="comment-date"><time datetime="<?php comment_time('c'); ?>"><?php echo get_comment_time(__('F jS, Y', 'tcd-w')); ?></time></li>
    </ul>
   </div>

   <ul class="comment-act">
<?php if (function_exists('comment_reply_link')) {
        if (get_option('thread_comments') == '1') { ?>
    <li class="comment-reply"><?php comment_reply_link(array_merge($args, array('add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span><span>'.__('REPLY', 'tcd-w').'</span></span>'))) ?></li>
<?php   } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
<?php   }
    } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'tcd-w'); ?></a></li>
<?php } ?>
    <li class="comment-quote"><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-content-<?php comment_ID() ?>', 'comment');"><?php _e('QUOTE', 'tcd-w'); ?></a></li>
    <?php edit_comment_link(__('EDIT', 'tcd-w'), '<li class="comment-edit">', '</li>'); ?>
   </ul>

  </div>
  <div class="comment-content post_content" id="comment-content-<?php comment_ID() ?>">
  <?php if ($comment->comment_approved == '0') : ?>
   <span class="comment-note"><?php _e('Your comment is awaiting moderation.', 'tcd-w'); ?></span>
  <?php endif; ?>
  <?php comment_text(); ?>
  </div>

<?php
}

// ソート処理 pre_get_posts
function sort_pre_get_posts($wp_query)
{
    // 管理画面は終了
    if (is_admin()) {
        return;
    }

    // メインクエリー・アーカイブ以外は終了
    if (! $wp_query->is_main_query() && ! $wp_query->is_archive()) {
        return;
    }

    // ソート
    if (isset($_REQUEST['sort'])) {
        // 閲覧数降順
        if ($_REQUEST['sort'] === 'views') {
            $wp_query->set('meta_key', '_view_count');
            $wp_query->set('orderby', 'meta_value_num');
            $wp_query->set('order', 'DESC');

        // 日時昇順
        } elseif ($_REQUEST['sort'] === 'date_asc') {
            $wp_query->set('orderby', 'date');
            $wp_query->set('order', 'ASC');

        // 日時降順
        } else {
            $wp_query->set('orderby', 'date');
            $wp_query->set('order', 'DESC');
        }
    }
}
add_action('pre_get_posts', 'sort_pre_get_posts');


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function official_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'prev_text' => __('<< 前へ'),
        'next_text' => __('次へ >>'),
        'mid_size' => 1,
        'total' => $wp_query->max_num_pages
    ));
}

/*********************************
 サブループページネーション出力用関数
**********************************/
function subPagination($end_size = 1, $mid_size = 2, $prev_next = true)
{
    global $the_query;

    $page_format = paginate_links(
        array(
      'current' => max(1, get_query_var('paged')),
      'total' => $the_query->max_num_pages,
      'type'  => 'array',
      'prev_text' => '<< 前へ',//前へのリンク文言
      'next_text' => '次へ >>',//次へのリンク文言
      'end_size' => $end_size,//初期値：１  両端のﾍﾟｰｼﾞﾘﾝｸの数
      'mid_size' => $mid_size,//初期値：２  現在のﾍﾟｰｼﾞの両端にいくつページリンクを表示するか（現在のページは含まない）
      'prev_next' => $prev_next,//初期値：true  リストの中に「前へ」「次へ」のリンクを含むか
    )
    );
    $code = '';
    if (is_array($page_format)) {
        $paged = get_query_var('paged') == 0 ? 1 : get_query_var('paged');
        $code .= '<div class="pagination">'.PHP_EOL;
        $code .= '<ul class="pagination__list">'.PHP_EOL;
        foreach ($page_format as $page) {
            $code .= '<li class="pagination__item">'.$page.'</li>'.PHP_EOL;
        }
        $code .= '</ul>'.PHP_EOL;
        $code .= '</div>'.PHP_EOL;
        // $code .= '<div class="pagination-total">'.$paged.'/'.$the_query->max_num_pages.'</div>'.PHP_EOL;
    }
    wp_reset_query();
    return $code;
}


/*********************************
 次へ、前へにクラスを追加
**********************************/
add_filter('previous_post_link', 'add_prev_post_link_class');
function add_prev_post_link_class($output)
{
    return str_replace('<a href=', '<a class="prev-link" href=', $output);
}
add_filter('next_post_link', 'add_next_post_link_class');
function add_next_post_link_class($output)
{
    return str_replace('<a href=', '<a class="next-link" href=', $output);
}


/*********************************
 管理画面に受講生の声の名前を表示
**********************************/

function add_posts_columns($columns)
{
    $columns['name'] = '名前';
    return $columns;
}
function custom_posts_column($column_name, $post_id)
{
    if ($column_name == 'name') {
        $cf_example = get_post_meta($post_id, 'name', true);
        echo ($cf_example) ? $cf_example : '－';
    }
}
add_filter('manage_posts_columns', 'add_posts_columns');
add_action('manage_posts_custom_column', 'custom_posts_column', 10, 2);


?>