<?php
	// カスタム検索用グローバル変数
	global $custom_search_vars;

	get_header();
	$dp_options = get_desing_plus_option();

	// タグフィルター用ターム配列
	$tags = false;
	if ($custom_search_vars) {
		if ($dp_options['show_search_results_tag_filter'] && $dp_options['show_search_results_tag_filter'] != 'hide') {
			if ($dp_options['searcn_post_type'] == 'post') {
				$tags = get_terms('post_tag', array());
			} elseif ($dp_options['searcn_post_type'] == 'introduce') {
				$tags = get_terms($dp_options['introduce_tag_slug'], array());
			}
			if (!$tags || is_wp_error($tags)) $tags = false;
		}
	}

	// sort
	if (!empty($_REQUEST['sort']) && in_array($_REQUEST['sort'], array('date_asc', 'date_desc', 'views'))) {
		$sort = $_REQUEST['sort'];
	} else {
		$sort = 'date_desc';
	}
	$sort_base_url = remove_query_arg('sort');
	$sort_base_url = preg_replace('#/page/\d+#', '', $sort_base_url);
?>

<?php get_template_part('breadcrumb'); ?>

<?php
	if (is_category() || is_tax()) {
		$queried_object = get_queried_object();
?>
<div class="archive_header">
 <div class="inner">
  <h2 class="headline rich_font"><?php echo esc_html($queried_object->name); ?></h2>
<?php
		if ($queried_object->description) {
?>
  <p class="desc"><?php echo str_replace(array("\r\n", "\r", "\n"), '<br>', esc_html($queried_object->description)); ?></h2>
<?php
		}
?>
 </div>
</div>
<?php
	} elseif ($dp_options['search_results_headline']) {
?>
<div class="archive_header">
 <div class="inner">
  <h2 class="headline rich_font"><?php echo esc_html($dp_options['search_results_headline']); ?></h2>
 </div>
</div>
<?php
	}
?>

<div id="main_col" class="clearfix">

 <div id="left_col" class="custom_search_results">

<?php
	if (have_posts() || !empty($_REQUEST['filter_tag'])) {
		// タグ絞り込み検索表示
		if ($tags) {
			// トグルあり オープン
			if ($dp_options['show_search_results_tag_filter'] === 'type2') {
				$toggle = 'open';
			// トグルあり クローズ
			} elseif ($dp_options['show_search_results_tag_filter'] === 'type3') {
				$toggle = 'close';
			} else {
				$toggle = '';
			}
			// トグルあり 絞り込み検索・ページ移動時にクッキー値でオープンクローズを上書き
			if ($toggle && (isset($_REQUEST['filter'])|| get_query_var('paged')) && !empty($_COOKIE['gensen_archive_filter_toggle']) && in_array($_COOKIE['gensen_archive_filter_toggle'], array('open', 'close'))) {
				$toggle = $_COOKIE['gensen_archive_filter_toggle'];
			}
?>
 <form action="?" method="get" class="archive_filter<?php if ($toggle) echo ' is-'.esc_attr($toggle); ?>">
<?php
			foreach(array('post_type', 'page_id', 'cat', 'p', 'sort', 'search_keywords', 'search_keywords_operator', 'search_cat1', 'search_cat2', 'search_cat3') as $get_key) {
				if (!empty($_REQUEST[$get_key])) {
?>
   <input type="hidden" name="<?php echo esc_attr($get_key); ?>" value="<?php echo esc_attr(stripslashes($_REQUEST[$get_key])); ?>">
<?php
				}
			}
			// トグルあり 絞り込み検索を判別するためにarchive_filterを出力
			if ($toggle) {
?>
  <input type="hidden" name="filter" value="1">
<?php
			}
?>
  <div class="archive_filter_headline rich_font"><?php _e('Refine Search', 'tcd-w'); ?></div>
  <div class="archive_filter_toggle"<?php if ($toggle == 'close') echo ' style="display:none"'; ?>>
    <div class="archive_filter_tag clearfix">
<?php
			foreach($tags as $tag) {
				$checked = '';
				if (!empty($_REQUEST['filter_tag']) && in_array($tag->term_id, $_REQUEST['filter_tag'])) {
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}
				echo '     <label><input type="checkbox" name="filter_tag[]" value="'.esc_attr($tag->term_id).'"'.$checked.'><span>'.esc_html($tag->name).'</span></label>'."\n";
			}
?>
    </div>
    <div class="button">
     <input type="submit" value="<?php _e('Search for', 'tcd-w'); ?>">
    </div>
  </div>
 </form>
<?php
		}
	}
?>

<?php if ( have_posts() ) : ?>
 <dl class="archive_sort clearfix">
  <dt><?php _e('Sort condition', 'tcd-w'); ?></dt>
  <dd><a href="<?php echo esc_attr(add_query_arg('sort', 'date_desc', $sort_base_url)); ?>"<?php if ($sort == 'date_desc') echo ' class="active"'; ?>><?php _e('Newest first', 'tcd-w'); ?></a></dd>
  <dd><a href="<?php echo esc_attr(add_query_arg('sort', 'date_asc', $sort_base_url)); ?>"<?php if ($sort == 'date_asc') echo ' class="active"'; ?>><?php _e('Oldest first', 'tcd-w'); ?></a></dd>
  <dd><a href="<?php echo esc_attr(add_query_arg('sort', 'views', $sort_base_url)); ?>"<?php if ($sort == 'views') echo ' class="active"'; ?>><?php _e('Large number of views', 'tcd-w'); ?></a></dd>
 </dl>

<?php get_template_part('navigation2'); ?>

 <ol id="post_list2">

<?php   while ( have_posts() ) : the_post(); ?>
  <li class="article">
   <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="clearfix">
    <div class="image">
     <?php 
			if ( has_post_thumbnail() ) { 
				if ( is_mobile() ) {
					the_post_thumbnail('size1'); 
				} else {
					the_post_thumbnail('size2'); 
				}
			} else { 
				if ( is_mobile() ) {
					echo '<img src="' . get_template_directory_uri() . '/img/common/no_image1.gif" title="" alt="" />';
				} else {
					echo '<img src="' . get_template_directory_uri() . '/img/common/no_image2.gif" title="" alt="" />';
				}
			} ?>
    </div>
    <div class="info">
<?php
        $metas = array();
        if ($post->post_type == 'post') {
          if ($dp_options['show_categories']) {
            foreach(explode('-', $dp_options['show_categories']) as $cat) {
              if ($cat == 1) {
                $terms = get_the_terms($post->ID, 'category');
                if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    $metas['category'][] = '<span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span>';
                  }
                  $metas['category'] = '<li class="cat">'.implode('', $metas['category']).'</li>';
                }
              } elseif (!empty($dp_options['use_category'.$cat])) {
                $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    $metas['category'.$cat][] = '<span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span>';
                  }
                  $metas['category'.$cat] = '<li class="cat">'.implode('', $metas['category'.$cat]).'</li>';
                }
              }
            }
          }

        } elseif ($post->post_type == $dp_options['introduce_slug']) {
          if ($dp_options['show_introduce_categories']) {
            foreach(explode('-', $dp_options['show_introduce_categories']) as $cat) {
              if (!empty($dp_options['use_introduce_category'.$cat])) {
                $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
                if ($terms && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    $metas['introduce_category'.$cat][] = '<span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span>';
                  }
                  $metas['introduce_category'.$cat] = '<li class="cat">'.implode('', $metas['introduce_category'.$cat]).'</li>';
                }
              }
            }
          }
        }

        if ($metas) {
          echo '    <ul class="meta clearfix">'.implode('', $metas).'</ul>'."\n";
        }
?>
     <h3 class="title"><?php trim_title(38); ?></h3>
     <p class="excerpt"><?php new_excerpt(118); ?></p>
    </div>
   </a>
  </li>
<?php   endwhile; ?>

 </ol><!-- END #post_list2 -->

<?php get_template_part('navigation2'); ?>

<?php else: ?>
 <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
<?php endif; ?>

</div><!-- END #left_col -->

<?php get_sidebar(); ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
