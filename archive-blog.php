<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col">
  <!-- カスタム投稿（ブログ） -->
  <div class="front-page__post -column">
    <h3 class="front-page__postHeading">コラム</h3>
    <ul class="front-page__postList">
      <?php while (have_posts()) : the_post(); ?>
      <!-- ▽ ループ開始 ▽ -->
      <li class="front-page__postItem">
        <a href="<?php the_permalink(); ?>">
          <span class="top_blog_index_box_img"><?php echo get_the_post_thumbnail(); ?></span>
          <div class="front-page__postInfo">
            <h4 class="front-page__postName"><?php the_title(); ?></h4>
            <ul class="post-categories">
              <?php $terms = wp_get_object_terms($post->ID, 'category_blog');
                if ($terms) {
                    foreach ($terms as $term) {
                        echo '<li class="'.$term->slug.'">'.$term->name.'</li>' ;
                    }
                };
                ?>
            </ul>
          </div>
        </a>
      </li>
      <!-- △ ループ終了 △ -->
      <?php endwhile; ?>
    </ul>

    <?php wp_reset_postdata(); ?>

    <div class="official_pagination__list">
      <?php official_pagination(); ?>
    </div>

  </div>
</div>



</div><!-- END #main_col -->

<?php get_footer(); ?>