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

<div id="recep">
	<div class="recep_wrapper">
		<h4><?php the_title(); ?></h4>
		<div class="recep_message">
			<h5>合同会社Smart Be代表 伊藤宏美より<br>
			報道関係者様へ</h5>
			<p class="mb60">弊社では、女性の未来のためにご提供しているサービスを<br class="sp">
			より多くの方に知っていただくために、メディア・報道関係者様に<br class="sp">
			ご紹介いただける機会を広く受け付けております。<br>
			<br>
			Smart Beは女性の起業に必要なことがすべて学べる女性のための総合アカデミーです。<br>
			起業というと「難しそう」「アヤシイ」「会社員以上の給料は望めない」といった<br class="sp">
			ネガティブなイメージがあると思いますが、<br class="sp">
			私たちは女性が起業を通して自由に思い描いた通りの人生を送るための<br class="sp">
			選択肢の1つとして、起業が当たり前にある社会を目指し、<br class="sp">
			起業によって安定的に理想の収入を得るためのメソッドを提供しております。<br>
			</p>
			<h5>お受けできる取材テーマ</h5>
			<p>年間2000人以上の集客を行い、女性起業家500人以上のビジネスサポートを行うアカデミーの代表の立場から、<br class="sp">
			女性の起業の専門家として女性の新しい生き方全般に関するあらゆることに回答可能です。</p>
			<ul>
				<li>1.最新の起業業界の実情についての情報（集客手法、収入の実態など）</li>
				<li>2.これから起業に取り組む方や既に実績を出しているアカデミー生へのインタビュー</li>
				<li>3.700人の女性が集まるEXPO等イベントに関する情報・コメント</li>
				<li>4.女性起業家の専門コメンテーターとして代表伊藤のコメント</li>
				<li>5.起業についてご相談に来られる方のご相談内容、今の時流の情報・コメント</li>
			</ul>
			<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_mainimg01.png">
			<table>
				<tr>
					<td>その他、対応可能なお手伝い</td>
					<td>
						<ul>
							<li>実際に起業を志すアカデミー生への取材手配</li>
							<li>アカデミーの授業風景の公開・撮影</li>
							<li>各種イベントの企画・運営、会場の提供</li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>メディア掲載実績</td>
					<td>
						<ul>
							<li>NHK</li>
							<li>日本テレビ</li>
							<li>楽天ラジオ</li>
							<li>日経ARIA</li>
						</ul>
					</td>
				</tr>
			</table>
			<div class="recep_message_works clearfix">
				<div class="recep_message_works_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_img01.png">
					<p>日本テレビ「スッキリ」キラキラ起業女子特集に出演（2017年8月24日放送）</p>
				</div>
				<div class="recep_message_works_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_img02.png">
					<p>NHK「シブ５時」イマドキ女子の起業特集に出演（2017年10月19日放送）</p>
				</div>
				<div class="recep_message_works_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_img03.png">
					<p>日経ARIA「個人ビジネス成功の方程式」に掲載（2019年4月17日掲載）</p>
				</div>
				<div class="recep_message_works_box">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_img04.png">
					<p>著書  玉の輿にのれなかった崖っぷち女が　年収1000万円になった黄金の大逆転ルール（2019年9月初版）</p>
				</div>
			</div>
		</div><!-- recep_message -->
		<div class="recep_profile">
			<div class="recep_profile_inner">
				<h5>代表　伊藤宏美プロフィール</h5>
				<img src="<?php echo get_template_directory_uri(); ?>/img/201909/rec_prof01.png">
				<p>1980年生まれ、神奈川県出身。<br>
				一流上場企業へ就職するが、「会社に雇われず自立したい」という想いから、35歳で一念発起し起業。<br>
				しかし現実は甘くなく、“売上ゼロ・集客ゼロ” な日々に陥り、がむしゃらに働き続けた結果、過労で倒れ、仕事ができない状態に。<br>
				「一生懸命働くのも大切だけど、もっと効率的に働く方法を見つけないと女性の幸せは手に入らない」と感じ、効率的・効果的に働ける道の一つとしてブランディングを意識するようになる。<br>
				それまで毎日投稿していたSNSに着目し、ブランディングとFacebookを掛け合わせた独自の集客メソッドを開発。<br>
				その結果90日間で効果があらわれ、年間1,000人以上の集客に成功。<br>
				また会社員時代より働く時間は1/3に減り、年収は8桁を超えるなど、満員電車に乗ることのない自由なライフスタイルを手に入れる。<br>
				現在は、起業塾「賢女の集客アカデミー」を主宰。<br>
				「SNSを賢く使った集客メソッドで、起業した女性に経済的な豊かさを手にしてもらいたい」という使命感から、受講生一人ひとりににあった集客メソッドを構築。わずか20日間で100万円以上の売上実績を出すなど、クライアントの業績アップに貢献。その実績やメソッドが認められ、NHK、日本テレビ、楽天ラジオなど大手メディアにも出演している。
				</p>
			</div>
		</div><!-- recep_profile -->
		<div class="recep_form">
			<h5>取材・サービスをご希望される<br>
				報道関係者様</h5>
			<p>取材・サービスをご希望される報道関係者様は下記お問い合わせフォームよりご連絡ください。<br>
			（<span>※</span>は必須項目です。）</p>
		</div><!-- recep_form -->
	</div><!-- recep_wrapper -->
</div><!-- id recep --->
<div id="contact">
	<div class="contact_wrapper">
		<div class="contact_form">
			<?php echo do_shortcode('[mwform_formkey key="340"]'); ?>
		</div><!-- contact_form -->
	</div><!-- contact_wrapper -->
</div><!-- id contact --->

</div><!-- END #main_col -->

<?php get_footer(); ?>