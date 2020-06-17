<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<img src="<?php echo get_template_directory_uri(); ?>/img/voice_header.jpg" alt="" class="voice_header pc tab">
<img src="<?php echo get_template_directory_uri(); ?>/img/voice_header-sp.jpg" alt="" class="voice_header sp">

<div id="voice">
    <div class="voice_wrapper">
        <?php if (have_posts()) : ?>
          <ul class="modal_trigger clearfix">
                <?php while (have_posts()) : the_post(); ?>
                    <li class="modal_btn over">
                        <div class="modal_btn_inner clearfix">
                            <?php the_post_thumbnail('thumbnail', array('class' => "modal_btn_inner_left")); ?>
                            <div class="modal_btn_inner_right">
                                <h5><?php the_title(); ?></h5>
                                <p><?php the_field('name'); ?>様<br>
                                <?php the_field('position'); ?></p>
                            </div>
                        </div>
                        <div class="modal_btn_more">READ MORE</div>
                    </li><!-- modal_btn -->
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
                <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        <?php if (have_posts()) : ?>
            <div class="modal_area">
                <?php while (have_posts()) : the_post(); ?>
                <div class="modal_box">
                    <div class="modal_bg"></div>
                    <div class="modal_inner">
                        <div class="modal_close">&times;</div>
                        <div class="modal_inner_in clearfix">
                            <?php the_post_thumbnail('thumbnail', array('class' => 'modal_inner_in_left')); ?>
                            <div class="modal_inner_in_right">
                                <h5><?php the_title(); ?></h5>
                                <p class="prof">
                                    <?php the_field('name'); ?>さん
                                    <?php the_field('position'); ?>
                                </p>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- modal_box -->
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="official_pagination__list">
            <?php official_pagination(); ?>
        </div>
    </div>


<?php get_footer(); ?>
