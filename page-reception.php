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

<div id="recep">
	<div class="recep_wrapper">
		<h4><?php the_title(); ?></h4>
		<div class="recep_message">
			<h5>合同会社Smart Be代表 伊藤宏美より<br>
			報道関係者様へ</h5>
			<p class="mb60">弊社では、女性の未来のためにご提供しているサービスを<br class="sp">
			より多くの方に知っていただくために、<br>メディア・報道関係者様に<br class="sp">
			ご紹介いただける機会を広く受け付けております。<br>
			<br>
			Smart Beは女性の起業に必要なことが<br class="sp">すべて学べる女性のための総合アカデミーです。<br>
			起業というと「難しそう」「アヤシイ」<br class="sp">「会社員以上の給料は望めない」といった<br>
			ネガティブなイメージがあると思いますが、<br>
			私たちは女性が起業を通して<br class="sp">自由に思い描いた通りの人生を送るための<br>
			選択肢の1つとして、起業が当たり前にある社会を目指し、<br>
			起業によって安定的に理想の収入を得るための<br class="sp">メソッドを提供しております。<br>
			</p>
			<h5>お受けできる取材テーマ</h5>
			<p>年間2,000人以上の集客を行い、<br>女性起業家500人以上のビジネスサポートを行う<br class="sp">アカデミーの代表の立場から、<br class="pc">
			女性の起業の専門家として<br class="sp">女性の新しい生き方全般に関するあらゆることに回答可能です。</p>
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
		<section class="about__representatives">
			<div class="about__representativesInner">
				<h1 class="about__heading">代表 プロフィール</h1>
				<div class="about__representativesContentsWrapper">
					<div class="about__representativesContentsInner">
						<img src="<?php echo get_template_directory_uri(); ?>/img/about/representatives.jpg" alt="伊藤宏美" class="about__representativesPhoto">
						<a href="//www.facebook.com/hiromi.ito.888" class="about__about__representativesSns pc"><?php echo file_get_contents(get_template_directory() . '/img/about/facebook_button.svg'); ?></a>
					</div>
					<div class="about__representativesContentsInner">
						<h2 class="about__representativesName">合同会社 Smart Be 代表　<br class="tab">伊藤宏美</h2>
						<p class="about__representativesContent">
							株式会社インテリジェンスでキャリアコンサルタント、
							GMOペイメントゲートウェイ株式会社で新卒・中途採用を経験。10年間、企業に属し役職まで就くも雇われず自立したいという思いから個人ビジネスで起業。
						</p>
						<p class="about__representativesContent">
							しかし現実は甘くなく、“売上ゼロ・集客ゼロ”の日々が続く。そんなある日、過労で倒れ仕事ができない状態に。「一生懸命働くのも大切だが、効率的な方法を探さないと女性の幸せは手に入らない」と感じソーシャルメディアを使った独自のWebマーケティング手法を開発。
							その結果90日間で効果があらわれ、年間1,000人以上の集客に成功。さらにはSNSからNHKや日本テレビ、楽天クリムゾンFM、出版社からの講演依頼をいただくなど活動の幅は多岐にわたる。
						</p>
						<p class="about__representativesContent">
							現在は賢女の集客アカデミーを主宰。受講生一人ひとりにあった集客メソッドを構築。企業で培った人生マネジメント能力をいかし、わずか20日間で売上100万円以上の売上実績を出すなどクライアントの業績アップに貢献している。
						</p>
						<div class="about__representativesSign"><?php echo file_get_contents(get_template_directory() . '/img/about/sign.svg'); ?></div>
						<a href="//www.facebook.com/hiromi.ito.888" class="about__about__representativesSns sp"><?php echo file_get_contents(get_template_directory() . '/img/about/facebook_button.svg'); ?></a>
					</div>
				</div>
			</div>
		</section>
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