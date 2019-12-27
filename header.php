<?php
global $dp_options;
if (! $dp_options) $dp_options = get_desing_plus_option();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php if($dp_options['use_ogp']) { ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php } ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<?php if ($dp_options['use_ogp']) { ogp(); }; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php if ($favicon = wp_get_attachment_image_src($dp_options['favicon'], 'full')) : ?>
<link rel="shortcut icon" href="<?php echo esc_attr($favicon[0]); ?>">
<?php endif; ?>
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>

<?php if ($dp_options['use_load_icon']) { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
<?php   if ($dp_options['load_icon'] == 'type3') { ?>
  <i></i><i></i><i></i><i></i>
<?php   } ?>
 </div>
</div>
<?php } ?>

 <div id="header">
  <div id="header_top">
   <div class="inner clearfix">
    <div class="header_upper">
      <div id="header_logo">
        <?php header_logo(); ?>
      </div>
      <div id="header_logo_fix">
        <?php header_logo_fix(); ?>
      </div>
      <div class="header_sublink pc">
        <ul>
          <li><a href="<?php bloginfo('url'); ?>/smartbe/faq/" class="first">よくある質問</a></li>
          <li><a href="<?php bloginfo('url'); ?>/smartbe/reception/">取材受付</a></li>
          <li><a href="<?php bloginfo('url'); ?>/smartbe/contact/" class="last">お問い合わせ</a></li>
        </ul>
      </div>
    </div><!-- header_upper -->
    <!-- 
    <?php if ($dp_options['show_search_bar_subpage'] && !is_front_page() && is_show_custom_search_form()) { ?>
        <a href="#" class="search_button"><span><?php _e('Search', 'tcd-w'); ?></span></a>
    <?php } ?>
    -->
    <!-- グローバルメニュー -->
    <?php if (has_nav_menu('global-menu')) { ?>
        <!-- SP_Gメニューボタン▼▼▼  -->
        <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
        <!-- SP_Gメニューボタン▲▲▲  -->
        <!-- Gメニューリスト▼▼▼  -->
        <div id="global_menu">
        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
        <ul class="sp">
          <li><a href="<?php bloginfo('url'); ?>/smartbe/faq/" class="first">よくある質問</a></li>
          <li><a href="<?php bloginfo('url'); ?>/smartbe/reception/">取材受付</a></li>
          <li><a href="<?php bloginfo('url'); ?>/smartbe/contact/" class="last">お問い合わせ</a></li>
        </ul>
        </div>
        <!-- Gメニューリスト▲▲▲  -->
    <?php } ?>
    <!-- グローバルメニューここまで -->
   </div>
  </div>
<?php if ($dp_options['show_search_bar_subpage'] && (!is_front_page() || $GLOBALS['custom_search_vars']) && is_show_custom_search_form()) { ?>
  <div id="header_search">
   <div class="inner">
<?php get_template_part('custom_search_form'); ?>
   </div>
  </div>
<?php } ?>
 </div><!-- END #header -->

 <div id="main_contents" class="clearfix">