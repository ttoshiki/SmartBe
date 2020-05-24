<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<img src="<?php echo get_template_directory_uri(); ?>/img/seminar_event_header.jpg" alt="" class="pc tab">
<img src="<?php echo get_template_directory_uri(); ?>/img/seminar_event_header-sp.jpg" alt="" class="sp">
<div id="main_col">

  <h2 class="archive__title">カテゴリーで絞り込む</h2>
  <div class="seminar-event__categoryList">
    <div class="seminar-event__tagItem -active">
        <?php
          $taxonomies = get_terms('event-category');
          foreach ($taxonomies as $taxonomy) {
              echo '<button class="seminar-event__taxonomyButton pc">' . $taxonomy-> name . '</button>';
          }
        ?>
        <div class="seminar-event__selectorWrapper sp">
          <select class="seminar-event__selector">
            <option value="all">すべて</option>
            <?php
            $index = 0;
              foreach ($taxonomies as $taxonomy) {
                  echo '<option value="' . $index . '">' . $taxonomy-> name . '</option>';
                  $index += 1;
              }
            ?>
          </select>
        </div>
    </div>
     <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 18,
            'paged' => $paged,
        );
        $the_query = new WP_Query($args);
    ?>
    <div class="seminar-event__tagItem">
      <?php
        $categories = get_categories($args);
        foreach ($categories as $cat) {
            //(例)classにスラッグを指定したカテゴリーのラベル
            echo '<button class="seminar-event__taxonomyButton pc ' . $cat->slug . '">'.$cat->name.'</button>';
        }
      ?>
      <div class="seminar-event__selectorWrapper sp">
        <select class="seminar-event__eventSelector">
            <option value="all">すべて</option>
            <?php
              foreach ($categories as $cat) {
                  echo '<option value="' . $cat->slug . '">' . $cat-> name . '</option>';
              }
            ?>
          </select>
      </div>
    </div>
  </div>
  <ul class="seminar-event__tab">
    <li class="seminar-event__tabButton -show">カレンダー</li>
    <li class="seminar-event__tabButton">イベント一覧</li>
  </ul>
  <div class="seminar-event__list">
    <div class="seminar-event__item -show">
        <div class="seminar-event__calendar -show">
          <?php echo do_shortcode('[eo_fullcalendar]'); ?>
        </div>
        <div class="seminar-event__calendarCategories">
          <?php foreach ($taxonomies as $taxonomy) {
                $calendarCategory = '[eo_fullcalendar category="' .$taxonomy->slug .'"]'; ?>
           <div class="seminar-event__calendarCategory">
             <?php echo do_shortcode($calendarCategory); ?>
           </div>
        <?php
            } ?>
        </div>
    </div>
    <div class="seminar-event__item">
      <?php if ($the_query->have_posts()) : ?>
      <ol id="post_list" class="clearfix">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php $post_categories = get_the_category(); ?>
        <li class="article
          <?php foreach ($post_categories as $category):
            echo $category->slug . ' ';
          endforeach;?>
        ">
          <?php echo $seminar_category->slug; ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <div class="image">
                <?php if (has_post_thumbnail()) {
              the_post_thumbnail('size2');
          } else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif" title="" alt="" /><?php } ?>
              </div>
              <h3 class="title js-ellipsis"><?php the_title(); ?></h3>
              <?php
              $metas = array();
              if ($post->post_type == 'post') {
                  if ($dp_options['show_categories']) {
                      foreach (explode('-', $dp_options['show_categories']) as $cat) {
                          if ($cat == 1) {
                              $terms = get_the_terms($post->ID, 'category');
                              if ($terms && !is_wp_error($terms)) {
                                  foreach ($terms as $term) {
                                      $metas[] = '<li class="cat"><span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                                  }
                              }
                          } elseif (!empty($dp_options['use_category'.$cat])) {
                              $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                              if ($terms && !is_wp_error($terms)) {
                                  $term = array_shift($terms);
                                  $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                              }
                          }
                      }
                  }
              } elseif ($post->post_type == $dp_options['introduce_slug']) {
                  if ($dp_options['show_introduce_categories']) {
                      foreach (explode('-', $dp_options['show_introduce_categories']) as $cat) {
                          if (!empty($dp_options['use_introduce_category'.$cat])) {
                              $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
                              if ($terms && !is_wp_error($terms)) {
                                  $term = array_shift($terms);
                                  $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                              }
                          }
                      }
                  }
                  if ($dp_options['show_date_introduce']) {
                      $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
                  }
              } elseif ($post->post_type == $dp_options['news_slug'] && $dp_options['show_date_news']) {
                  $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
              }

                if ($metas) {
                    echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
                    echo the_category();
                }
            ?>
          </a>
        </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>


      </ol><!-- END #post_list -->
      <?php else: ?>
      <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
      <?php endif; ?>
        <?php
          if (subPagination()) {
              echo subPagination();
          }
        ?>

    </div>
  </div>



</div><!-- END #main_col -->

<?php get_footer(); ?>