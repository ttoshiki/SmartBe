<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>
<?php get_template_part('breadcrumb'); ?>

<div id="primary">
	<div id="content" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">

				<!-- Display event title -->
				<h1 class="entry-title"><?php the_title(); ?></h1>

			</header><!-- .entry-header -->

			<ul class="post-categoryList">
				<?php
                $terms = wp_get_object_terms($post->ID, 'category_blog');//カスタムタクソノミーのスラッグ
                if ($terms) {
                    foreach ($terms as $term) {
                        echo '<span class="post-categoryItem">'.$term->name.'</span>' ;
                    }
                };
        ?>
			</ul>

			<div class="event-post-thumbnail">
				<?php
                    if (has_post_thumbnail()) { // 投稿にアイキャッチ画像が割り当てられているかチェックします。
                        the_post_thumbnail('large');
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/img/common/no_image2.gif" title="" alt="" />';
                    }
                ?>
			</div>


			<div class="entry-content">

				<!-- The content or the description of the event-->
				<?php the_content(); ?>
			</div><!-- .entry-content -->

			<div class="event-prevNextLinks">
				<?php previous_post_link('%link', '<< 前へ'); ?>
				<?php next_post_link('%link', '次へ >>'); ?>
			</div>

			</article><!-- #post-<?php the_ID(); ?> -->

			<!-- If comments are enabled, show them -->

		<?php endwhile; // end of the loop.?>

	</div><!-- #content -->
</div><!-- #primary -->

<!-- Call template footer -->
<?php get_footer();
