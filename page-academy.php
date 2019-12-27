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

<div id="about">
	<div class="about_wrapper">
		<div class="about_main clearfix">
			<div class="about_main_left">
				<div class="about_main_left_inner">
				<h2>SmartBeとは<br>
				起業やライフスタイルを豊かにする<br>
				女性のための総合アカデミーです</h2>
				<p>好きを仕事にして、経済的自立をしながら<br>
				自分らしい美しく豊かな人生を生きていくための<br>
				手段を学ぶことができます。</p>
				</div>
			</div>
			<div class="about_main_right">
				<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_main.png">
			</div>
		</div><!-- about_main -->
		<div class="about_step">
			<h3>未来へのステップアップ</h3>
			<div class="about_step_inner clearfix">
				<div class="about_step_inner_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_step01.png">
					<h4>学び</h4>
					<p>経済的自立の方法、美容、メンタルなど女性が自由な生き方を得るためのセミナーを常時多数開催中。まずはセミナーに参加してあなたにぴったりの学びを見つけましょう。</p>
				</div>
				<div class="about_step_inner_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_step02.png">
					<h4>出会い</h4>
					<p>集客アカデミーやスクールには100名を超える同じ志を持った仲間が待っています！共に学ぶことでモチベーション高く学びを継続でき、コミュニティの力も身につきます。</p>
				</div>
				<div class="about_step_inner_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_step03.png">
					<h4>未来を選ぶ</h4>
					<p>学びの実践を通して、経済的自由や時間的余裕が手に入りさらに多くの可能性が広がっていきます。自分だけの美しい生き方を手に入れて人生の輝きを増していきましょう！</p>
				</div>
			</div>
			<div class="about_border"></div>
		</div><!-- about_step -->
		<div class="about_message">
			<h3>女性が自由に生きていくために<br>
				必要なものとは</h3>
			<p>この問いにあなたはなんと答えるでしょうか？<br><br class="sp">
			私の答えは「選ぶ力」です。<br><br class="sp">
			なぜならば、人生は選択の連続だから。<br><br class="sp">
			<br><br class="sp">
			生まれてからずっと、幾つもの選択を重ね、私たちは今いる場所に立っています。<br><br class="sp">
			そしてその時々で、多くの選択肢を持っておくことが、<br>
			自分にとってベストな道を選び、<br>
			理想の人生に近づく唯一の方法と考えています。<br><br class="sp">
			<br><br class="sp">
			私自身、会社からもらったお金の中で生活をしていく、<br>
			という選択肢しか持っていなかった頃は、<br>
			とても不自由で窮屈な時間を過ごしていました。<br><br class="sp">
			しかし、そんな人生を変えようと、起業や副業について学んだり、<br>
			様々な場所に出向き新たな出会いを増やしていくことで、<br>
			時間を有効に使うための手段を知り、<br>
			選択した結果、理想の生き方に近づくことができました。<br><br class="sp">
			<br><br class="sp">
			ここ数年は起業ブームや副業解禁など、<br>
			社会的にも生き方の選択肢は増えてきていますが、<br>
			それでも尚、女性がもつ選択肢は十分ではないと感じます。<br><br class="sp">
			<br><br class="sp">
			なぜなら女性は仕事以外にも結婚や妊娠・出産、親の介護など、<br>
			社会の構造上、どうしてもやらなければならないことが多く、<br>
			自分の理想の人生を歩むのが難しいからです。<br><br class="sp">
			<br><br class="sp">
			そこでSmartBeではそんな環境の中でも、<br>
			たくさんの学びを通して、女性が起業をすることで、<br>
			会社や夫の収入に頼らない経済的な自立をし、<br>
			思い描いた通りの理想の人生を送れるよう、<br>
			様々なサポートを行っています。<br><br class="sp">
			<br><br class="sp">
			私たちと一緒に人生の選択肢を増やしていきましょう！</p>	
			<p class="about_message_name">SmartBe代表　伊藤宏美</p>
			<div class="about_border"></div>
		</div><!-- about_message -->
	</div><!-- about_wrapper -->
</div><!-- id about --->

</div><!-- END #main_col -->

<?php get_footer(); ?>