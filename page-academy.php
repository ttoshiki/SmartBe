<?php
    get_header();

    $display_title = get_post_meta($post->ID, 'display_title', true);
    if (!$display_title) {
        $display_title = 'show';
    }
    $display_side_content = get_post_meta($post->ID, 'display_side_content', true);
    if (!$display_side_content) {
        $display_side_content = 'show';
    }

    $image_id = get_post_meta($post->ID, 'page_image', true);
    if ($image_id) {
        $image = wp_get_attachment_image_src($image_id, 'full');
    }
    if (!empty($image[0])) {
        $headline = get_post_meta($post->ID, 'page_headline', true);
        $caption_style = 'font-size:'.get_post_meta($post->ID, 'page_headline_font_size', true).'px;';
        $caption_style .= 'color:'.get_post_meta($post->ID, 'page_headline_color', true).';';
        $shadow1 = get_post_meta($post->ID, 'page_headline_shadow1', true);
        $shadow2 = get_post_meta($post->ID, 'page_headline_shadow2', true);
        $shadow3 = get_post_meta($post->ID, 'page_headline_shadow3', true);
        $shadow4 = get_post_meta($post->ID, 'page_headline_shadow4', true);
        if (empty($shadow1)) {
            $shadow1 = 0;
        }
        if (empty($shadow2)) {
            $shadow2 = 0;
        }
        if (empty($shadow3)) {
            $shadow3 = 0;
        }
        if (empty($shadow4)) {
            $shadow4 = '#333333';
        }
        if ($shadow1 || $shadow2 || $shadow3) {
            $caption_style .= 'text-shadow:'.$shadow1.'px '.$shadow2.'px '.$shadow3.'px '.$shadow4.';';
        }
    }
?>

<?php get_template_part('breadcrumb'); ?>

<?php if (!empty($image[0])) { ?>
  <div id="header_image">
   <img src="<?php echo esc_attr($image[0]); ?>" alt="" />
   <?php if ($headline) { ?>
   <div class="caption rich_font" style="<?php echo esc_attr($caption_style); ?>">
    <?php echo str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($headline)); ?>
   </div>
   <?php } ?>
  </div>
<?php } ?>

<img src="<?php echo get_template_directory_uri(); ?>/img/about/header.jpg" alt="アカデミー" class="about__header">

<div id="academy">
	<section>
		<p><strong>Facebook集客メソッド</strong>の内容を実践すると、</p>
		<span>あなたが開催する</span>
		<h1>
			「女子会・お茶会・ランチ会・朝活」も、<br />
			<strong>毎回安定してお客様が集まる</strong>
			ようになります！
		</h1>
	</section>
	<section class="academy__freedom">
		<h1 class="academy__reasonHeading">Facebookを賢く使いこなすことで、手に入る<strong>3</strong>つの自由</h1>
		<div class="about__reasonDotLine"><?php echo file_get_contents(get_template_directory() . '/img/about/reason_dot_line.svg'); ?></div>
		<ul class="academy__freedomList">
			<li class="academy__freedomItem">
				<div class="about__reasonDotLine"><?php echo file_get_contents(get_template_directory() . '/img/icon_money.svg'); ?></div>
				<span>経済的自由</span>
			</li>
			<li class="academy__freedomItem">
				<div class="about__reasonDotLine"><?php echo file_get_contents(get_template_directory() . '/img/icon_heart.svg'); ?></div>
				<span>精神的自由</span>
			</li>
			<li class="academy__freedomItem">
				<div class="about__reasonDotLine"><?php echo file_get_contents(get_template_directory() . '/img/icon_clock.svg'); ?></div>
				<span>時間的自由</span>
			</li>
		</ul>
		<h2 class="academy__reasonSubHeading">これらが手に入るFacebook集客セミナーを開催しています！</h2>
		<button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>セミナー情報はこちら</button>
	</section>
	<img src="<?php echo get_template_directory_uri(); ?>/img/academy/academy01.jpg" alt="" class="academy__fullSizeImage">
	<section class="academy__charm">
		<h1 class="academy__charmHeading">
			<?php echo file_get_contents(get_template_directory() . '/img/about/reason_dot_line.svg'); ?>
			<span>2分で分かる集客アカデミーの魅力</span>
		</h1>
		<div>
			動画が入ります
		</div>
	</section>
	<section class="academy__voice">
		<h1 class="academy__voiceHeading">たくさんの受講生たちが圧倒的な成果を出しています！</h1>
		<ul class="academy__voiceList">
			<li class="academy__voiceItem">起業がはじめての私でも、<strong class="academy__voiceItemStrong">60人以上の集客に成功！</strong></li>
			<li class="academy__voiceItem">Facebook初心者でも<strong class="academy__voiceItemStrong">2日で満員御礼に！</strong></li>
			<li class="academy__voiceItem">売上数万円だった私が、<strong class="academy__voiceItemStrong">月商7桁を達成！夫婦仲も◎に♪</strong></li>
			<li class="academy__voiceItem">子どもがいる私でもFacebookからのお申込みで<strong class="academy__voiceItemStrong">毎回満員御礼！</strong></li>
			<li class="academy__voiceItem">発信の仕方を変えたことでお客様との距離が縮まったのを実感！<strong class="academy__voiceItemStrong">成約率も上がりました！</strong></li>
		</ul>
		<a href="/voice"><img src="<?php echo get_template_directory_uri(); ?>/img/about/banner.jpg" alt="" class="about__reasonBanner"></a>
	</section>
	<section class="academy__learn">
		<h1>賢女の集客アカデミーで学べる<strong>3</strong>つのポイント</h1>
		<ul class="academy__learnList">
			<li class="academy__learnItem">
				<div class="academy__learnItemContents">
					<h2 class="academy__learnSubHeading">Facebookで叶う！<strong class="academy__learnStrong">賢い集客方法</strong></h2>
					<p class="academy__learnItemText">Facebookは集客の最強ツール！あなたのファンをたくさん作り、人脈をより強固にすることによって、少ない時間と労力で着実に集客できるようになります。この集客方法をマスターすれば、どんなイベント集客にも困ることはありません！</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/learn01.jpg" alt="" class="academy__learnItemPhoto">
			</li>
			<li class="academy__learnItem">
				<div class="academy__learnItemContents">
					<h2 class="academy__learnSubHeading">「女子会・お茶会・ランチ会・朝活」で<strong class="academy__learnStrong">月収7桁</strong>は可能！</h2>
					<p class="academy__learnItemText">稼げる人が大切にしていること、そして月収7桁を稼ぐために必要な準備や心構えとは。「女子会・お茶会・ランチ会・朝活」を楽しく開催しながら、ビジネスを飛躍させ突き抜ける方法をお伝えします。</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/learn02.jpg" alt="" class="academy__learnItemPhoto">
			</li>
			<li class="academy__learnItem">
				<div class="academy__learnItemContents">
					<h2 class="academy__learnSubHeading">口コミが起こる<strong class="academy__learnStrong">コミュニティの作り方</strong></h2>
					<p class="academy__learnItemText">新しいお客様に来ていただくことも大切ですが、あなたやコミュニティのファンになってもらい、お客さまがお友だちを誘いたくなる仕組みづくりも重要です。いつまでも口コミされて愛されるコミュニティの秘密をお伝えします！</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/learn03.jpg" alt="" class="academy__learnItemPhoto">
			</li>
		</ul>
	</section>
</div><!-- id academy --->

</div><!-- END #main_col -->

<?php get_footer(); ?>