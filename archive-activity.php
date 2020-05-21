<?php
    get_header();
    $dp_options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<h1 class="activity__title"><?php echo post_type_archive_title('', false); ?></h1>

<?php if (have_posts()) : ?>
  <div id="activity">
    <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li class="activity__list">
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="activity__datetime"><?php echo get_the_date('Y.m.d'); ?></time>
            <div class="activity__Contents">
                <h3 class="activity__heading"><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <?php
                    $thumbnail1 = get_field('thumbnail1');
                    $thumbnail2 = get_field('thumbnail2');
                    if ($thumbnail1 || $thumbnail2) { ?>
                        <div class="activity__thumbnail">
                        <?php
                            echo wp_get_attachment_image($thumbnail1, 'medium');
                            echo wp_get_attachment_image($thumbnail2, 'medium');
                        ?>
                        </div>
                    <?php }
                ?>
            </div>
        </li>
        <?php endwhile; ?>
        <?php else: ?>
            <p class="no_post"><?php _e('There is no registered post.', 'tcd-w'); ?></p>
        <?php endif; ?>
    </ul>

<?php get_footer(); ?>
