<?php
    get_header();

    $display_title = get_post_meta($post->ID, 'display_title', true);
    if (!$display_title) $display_title = 'show';
    $display_side_content = get_post_meta($post->ID, 'display_side_content', true);
    if (!$display_side_content) $display_side_content = 'show';

    $image_id = get_post_meta($post->ID, 'page_image', true);
    if ($image_id) {
      $image = wp_get_attachment_image_src( $image_id, 'full' );
    }
    if (!empty($image[0])) {
      $headline = get_post_meta($post->ID, 'page_headline', true);
      $caption_style = 'font-size:'.get_post_meta($post->ID, 'page_headline_font_size', true).'px;';
      $caption_style .= 'color:'.get_post_meta($post->ID, 'page_headline_color', true).';';
      $shadow1 = get_post_meta($post->ID, 'page_headline_shadow1', true);
      $shadow2 = get_post_meta($post->ID, 'page_headline_shadow2', true);
      $shadow3 = get_post_meta($post->ID, 'page_headline_shadow3', true);
      $shadow4 = get_post_meta($post->ID, 'page_headline_shadow4', true);
      if (empty($shadow1)) $shadow1 = 0;
      if (empty($shadow2)) $shadow2 = 0;
      if (empty($shadow3)) $shadow3 = 0;
      if (empty($shadow4)) $shadow4 = '#333333';
      if ($shadow1 || $shadow2 || $shadow3) {
        $caption_style .= 'text-shadow:'.$shadow1.'px '.$shadow2.'px '.$shadow3.'px '.$shadow4.';';
      }
    }
?>

<?php get_template_part('breadcrumb'); ?>

<?php if (!empty($image[0])) { ?>
  <div id="header_image">
   <img src="<?php echo esc_attr($image[0]); ?>" alt="" />
   <?php if ($headline){ ?>
   <div class="caption rich_font" style="<?php echo esc_attr($caption_style); ?>">
    <?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($headline)); ?>
   </div>
   <?php } ?>
  </div>
<?php } ?>

<div id="contact">
	<div class="contact_wrapper">
		<h4><?php the_title(); ?></h4>
		
		<div class="contact_form conf">
			<p>入力内容を確認後、「上記の内容で送信する」ボタンから内容を送信してください。<br>
      （<span>※</span>は必須項目です。）</p>
			<?php echo do_shortcode('[mwform_formkey key="346"]'); ?>
		</div><!-- contact_form -->
	</div><!-- contact_wrapper -->
</div><!-- id contact --->

</div><!-- END #main_col -->

<?php get_footer(); ?>