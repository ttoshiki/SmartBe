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

<img src="<?php echo get_template_directory_uri(); ?>/img/about/header.jpg" alt="はじめての方へ" class="about__header pc tab">
<img src="<?php echo get_template_directory_uri(); ?>/img/about/header-sp.jpg" alt="はじめての方へ" class="about__header sp">

<main class="about">
	<section class="about__learn">
		<h1 class="about__heading">女性による女性のための学び</h1>
		<p class="about__learnLead">
			Smart Beでは女性が「好き」なことを<br class="sp">仕事にして<br class="pc tab" />経済的自立をしながら<br class="sp">自分らしく美しく豊かな人生を生きるための<br />さまざまな学びをご提供しています
		</p>
		<ul class="about__learnList">
			<li class="about__learnItem">
				<div class="about__learnImage"><?php echo file_get_contents(get_template_directory() . '/img/about/learn01.svg'); ?></div>
				<h2 class="about__learnItemHeading">圧倒的な集客力</h2>
				<p class="about__learnItemContent">一人ひとりに合わせた<br />再現性の高い集客が可能に</p>
			</li>
			<li class="about__learnItem">
				<div class="about__learnImage"><?php echo file_get_contents(get_template_directory() . '/img/about/learn02.svg'); ?></div>
				<h2 class="about__learnItemHeading">SNSの影響力</h2>
				<p class="about__learnItemContent">楽しく賢くSNSを使い、<br />インフルエンサーになる</p>
			</li>
			<li class="about__learnItem">
				<div class="about__learnImage"><?php echo file_get_contents(get_template_directory() . '/img/about/learn03.svg'); ?></div>
				<h2 class="about__learnItemHeading">自分らしい生き方</h2>
				<p class="about__learnItemContent">心身ともに明るく健康的に、<br />豊かな人生を送る</p>
			</li>
		</ul>
	</section>
	<section class="about__reason">
		<div class="about__reasonDecoration"><?php echo file_get_contents(get_template_directory() . '/img/about/reason_decoration.svg'); ?></div>
		<h1 class="about__reasonHeading">Smart Beが選ばれる<br class="sp"><strong class="about__reasonHeadingStrong">3</strong>つの理由</h1>
		<ul class="about__reasonList">
			<li class="about__reasonItem">
				<div class="about__reasonText">
					<h2 class="about__reasonItemHeading">「好き」を仕事にできる</h2>
					<p class="about__reasonContent">
						「好きこそ物の上手なれ」ということわざがあるように誰でも好きなものには熱中し、自然と上達するもの。<br />
						その効果をうまく利用しながら女性ならではの働き方を学べます。
					</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/about/reason01.jpg" alt="" class="about__reasonImage">
			</li>
			<li class="about__reasonItem">
				<img src="<?php echo get_template_directory_uri(); ?>/img/about/reason02.jpg" alt="" class="about__reasonImage">
				<div class="about__reasonText">
					<h2 class="about__reasonItemHeading">経済的自立ができる</h2>
					<p class="about__reasonContent">
						会社や夫、パートナーなどの収入に頼る時代はもう終わり！<br />
						自分の「好き」を仕事として確立し、女性が自分の力だけで人生を歩めるようアシストしていきます。
					</p>
				</div>
			</li>
			<li class="about__reasonItem">
				<div class="about__reasonText">
					<h2 class="about__reasonItemHeading">人生の選択肢が増える</h2>
					<p class="about__reasonContent">
						結婚や妊娠・出産、親の介護などで自分の人生を歩むのが難しい女性がたくさんの学びを通して精神的・経済的な自立をし、理想の人生を送れるようにサポートします。
					</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/about/reason03.jpg" alt="" class="about__reasonImage">
			</li>
		</ul>
	</section>
	<section class="about__data">
		<h1 class="about__heading">受講生データ</h1>
		<ul class="about__dataList">
			<li class="about__dataItem">
				<h2 class="about__dataItemHeading">受講生の数</h2>
				<hr class="about__dataItemLine" />
				<div class="about__dataChart"><?php echo file_get_contents(get_template_directory() . '/img/about/data_chart01.svg'); ?></div>
				<p class="about__dataExplanation">2017年にSmart Be創業以来、高い満足度を獲得し続け、受講生は急増し続けています。</p>
			</li>
			<li class="about__dataItem">
				<h2 class="about__dataItemHeading">受講生の年代</h2>
				<hr class="about__dataItemLine" />
				<div class="about__dataChart"><?php echo file_get_contents(get_template_directory() . '/img/about/data_chart02.svg'); ?></div>
				<p class="about__dataExplanation">受講生の半数が起業されたばかりの30代・40代の女性たちです。</p>
			</li>
		</ul>
		<div class="dotLine"><?php echo file_get_contents(get_template_directory() . '/img/about/reason_dot_line.svg'); ?></div>
		<h3 class="about__dataSummary">受講生は主にコーチ・コンサル・<br class="tab">セラピスト・お教室運営など<br /><strong class="about__dataSummaryStrong">おひとりさま起業で<br class="sp">頑張る女性たち</strong>です</h3>
		<a href="/voice"><img src="<?php echo get_template_directory_uri(); ?>/img/about/banner.jpg" alt="" class="about__reasonBanner"></a>
	</section>
	<section class="about__about">
		<h1 class="about__heading">Smart Beとは</h1>
		<p class="about__aboutContents">
			強く、そして本物の美しさをもつ女性は<br />
			“賢さ”を持ち合わせていると思い<br />
			社名に「Smart」をいれました。
		</p>
		<p class="about__aboutContents">
			そして「Be」の部分には<br />
			あなたに必要な学びを選択し<br class="sp">自分なりの“賢さ”を<br />
			作り上げてもらえたらという<br class="sp">願いを込めています。
		</p>
		<p class="about__aboutContents">
			そのためには「Be」にあたる<br class="sp">講座をたくさんご提供し<br class="pc" />
			企業理念である
		</p>
		<p class="about__aboutContents"><strong class="about__aboutContentsStrong">「学びを通して、人生を選択できる、</strong><br class="sp"><strong class="about__aboutContentsStrong">自由で幸せな女性を創出する」</strong></p>
		<p class="about__aboutContents">
			これを多くの女性に体現してもらえるよう<br />
			たくさんの想いと願いを込めて<br class="sp">Smart Beといたしました。
		</p>
	</section>
	<section class="about__representatives">
		<div class="about__representativesInner">
			<h1 class="about__heading">代表紹介</h1>
			<div class="about__representativesContentsWrapper">
				<div class="about__representativesContentsInner">
					<img src="<?php echo get_template_directory_uri(); ?>/img/about/representatives.jpg" alt="伊藤宏美" class="about__representativesPhoto">
					<a href="//www.facebook.com/hiromi.ito.888" class="about__about__representativesSns pc"><?php echo file_get_contents(get_template_directory() . '/img/about/facebook_button.svg'); ?></a>
				</div>
				<div class="about__representativesContentsInner">
					<h2 class="about__representativesName">合同会社 Smart Be 代表　<br class="tab">伊藤宏美</h2>
					<p class="about__representativesContent">
						株式会社インテリジェンスでキャリコンサルタント、
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
</main>

</div><!-- END #main_col -->

<?php get_footer(); ?>