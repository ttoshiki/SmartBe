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

<div class="academy__mainVisual">
	<div class="academy__mainVisualCta">
		<img src="<?php echo get_template_directory_uri(); ?>/img/academy/main_visual_text.png" alt="アカデミー" class="academy__mainVisualText">
		<div class="academy__mainVisualButtons">
			<a href="" class="academy__mainVisualButton"><span>オンライン講座</span></a>
			<a href="" class="academy__mainVisualButton">教室講座</a>
		</div>
	</div>
</div>

<div id="academy">
	<section class="academy__intro">
		<div class="academy__introSpeechBubbleWrapper">
			<p class="academy__introParagraph">
				<strong class="academy__introParagraphStrong">Facebook集客メソッド</strong>の内容を実践すると、
				<span class="academy__introSpeechBubble"></span>
			</p>
		</div>
		<div class="academy__introCatchCopy">
			<span class="academy__introCatchCopySpan">あなたが<br />開催する</span>
			<h1 class="academy__introCatchCopyHeading">
				「女子会・お茶会・ランチ会・朝活」も、<br />
				<strong class="academy__introCatchCopyStrong">毎回安定してお客様が集まる</strong><br />
				ようになります！
			</h1>
		</div>
	</section>
	<section class="academy__freedom">
		<div class="academy__freedomInner">
			<h1 class="academy__reasonHeading">Facebookを賢く使いこなすことで、手に入る<strong>3</strong>つの自由</h1>
			<div class="dotLine"><?php echo file_get_contents(get_template_directory() . '/img/about/reason_dot_line.svg'); ?></div>
			<ul class="academy__freedomList">
				<li class="academy__freedomItem">
					<div class="academy__freedomReasonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_money.svg'); ?></div>
					<span class="academy__freedomItemText">経済的自由</span>
				</li>
				<li class="academy__freedomItem">
					<div class="academy__freedomReasonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_heart.svg'); ?></div>
					<span class="academy__freedomItemText">精神的自由</span>
				</li>
				<li class="academy__freedomItem">
					<div class="academy__freedomReasonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_clock.svg'); ?></div>
					<span class="academy__freedomItemText">時間的自由</span>
				</li>
			</ul>
			<h2 class="academy__reasonSubHeading">これらが手に入る<strong class="academy__reasonSubHeadingStrong">Facebook集客セミナー</strong>を開催しています！</h2>
			<button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>セミナー情報はこちら</button>
		</div>
	</section>
	<img src="<?php echo get_template_directory_uri(); ?>/img/academy/academy01.jpg" alt="" class="academy__fullSizeImage">
	<section class="academy__charm">
		<h1 class="academy__charmHeading">
			<?php echo file_get_contents(get_template_directory() . '/img/icon_video.svg'); ?>
			<span class="academy__charmHeadingText">2分で分かる集客アカデミーの魅力</span>
		</h1>
		<div class="academy__movie">
			<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/263702744?color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
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
	<section class="academy__appearance">
		<?php echo file_get_contents(get_template_directory() . '/img/academy/appearance.svg'); ?>
		<img src="<?php echo get_template_directory_uri(); ?>/img/academy/appearance_photo.jpg" alt="" class="academy__appearancePhoto">
		<button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>セミナー情報はこちら</button>
	</section>
	<section class="academy__recommend">
		<h1 class="academy__recommendHeading">こんな方にオススメ！</h1>
		<?php echo file_get_contents(get_template_directory() . '/img/academy/recommend.svg'); ?>
	</section>
	<section class="academy__master">
		<?php echo file_get_contents(get_template_directory() . '/img/academy/master_after.svg'); ?>
		<h1 class="academy__masterHeading">「女子会・お茶会・ランチ会・朝活」が<br /><strong class="academy__masterHeadingStrong">毎月10人集客できる</strong>ようになります！</h1>
	</section>
	<section class="academy__achievement">
		<ul class="academy__achievementList">
			<li class="academy__achievementItem">
				<span class="academy__achievementSpan">Facebookで<strong class="academy__achievementSpanStrong">103</strong>人の集客に成功！</span>
				<?php echo file_get_contents(get_template_directory() . '/img/academy/activity01.svg'); ?>
				<p class="academy__achievementParagraph">毎回<strong class="academy__achievementStrong">超満員御礼</strong>のお茶会。これまで<strong class="academy__achievementStrong">17</strong>回開催し、<strong class="academy__achievementStrong">103</strong>人の方々にご参加いただきました！</p>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/achievementImage01.jpg" alt="" class="academy__achievementImage">
			</li>
			<li class="academy__achievementItem">
				<span class="academy__achievementSpan">早朝でも安定集客！</span>
				<?php echo file_get_contents(get_template_directory() . '/img/academy/activity02.svg'); ?>
				<p class="academy__achievementParagraph"><strong class="academy__achievementStrong">学ぶオンナは美しい</strong>と題して、月<strong class="academy__achievementStrongSmall">2</strong>回朝活を開催。早朝でも安定して、毎回<strong class="academy__achievementStrongSmall">10</strong>人前後を集客！</p>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/achievementImage02.jpg" alt="" class="academy__achievementImage">
			</li>
			<li class="academy__achievementItem">
				<span class="academy__achievementSpan">700人の起業女子があつまったEXPO</span>
				<?php echo file_get_contents(get_template_directory() . '/img/academy/activity03.svg'); ?>
				<p class="academy__achievementParagraph">Facebookを使って700人の女性を集客。<br /><strong class="academy__achievementStrong">メディアにも取り上げられ話題になりました！</strong></p>
				<img src="<?php echo get_template_directory_uri(); ?>/img/academy/achievementImage03.jpg" alt="" class="academy__achievementImage">
			</li>
		</ul>
	</section>
	<section class="academy__fullThanks">
		<h1 class="academy__fullThanksHeading">Facebookを使いこなせば<strong>満員御礼</strong>はあたり前に！</h1>
		<h2 class="academy__fullThanksSubHeading">集客を楽しめるようになった女性起業家は<br /><strong class="academy__fullThanksStrong">Facebookを効果的に活用しています！</strong></h2>
		<p class="academy__fullThanksParagraph">実際に、Facebookを活用して、「集客を楽しめるようになった！」「売上UPが叶った！」という女性起業家はたくさんいます。そうなると自然と満員御礼は当たり前となります。</p>
		<img src="<?php echo get_template_directory_uri(); ?>/img/academy/full_thanks.jpg" alt="" class="academy__fullThanksImage">
		<div class="academy__fullThanksQuestion">
			<h2>あなたも、Facebookを賢く活用して<br />
			本物の自由を手に入れませんか？</h2>
		</div>
	</section>
	<section class="academy__message">
		<h1 class="academy__messageHeading">Smart Be代表 伊藤宏美からのメッセージ</h1>
		<div class="academy__messageContents">
			<img src="<?php echo get_template_directory_uri(); ?>/img/academy/ito-hiromi.jpg" alt="伊藤宏美" class="academy__messageImage">
			<div class="academy__messageContent">
				<p>「自分を必要としてくれている人に求められて、より良いサービスを提供したい」</p>
				<p>そう思っているのになかなか上手くいかず、素敵なお客さまに出会う前に疲れてやめてしまう方がほとんどではないでしょうか？</p>
				<p>賢い集客方法がわかれば、Facebookは集客にもブランディングにも使える最強のSNSです。</p>
				<p>そのステップを細分化し、誰にでもすぐに実践できるレベルまで具体的に落とし込み、なおかつ再現性が高いノウハウが学べるのが「賢女の集客アカデミー」です。</p>
				<p>あなたの「理想的な未来」を「現実」にしていくために。</p>
				<p>美しく凛とした、賢い女性としてあなたが行動できるキッカケになれば嬉しいです。</p>
			</div>
		</div>
		<button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>セミナー情報はこちら</button>
	</section>
	<section class="academy__online">
		<span class="academy__onlineHeadingSpan">講座に通えない方も自宅で学べる！</span>
		<h1 class="academy__onlineHeading">
			<?php echo file_get_contents(get_template_directory() . '/img/academy/master_after.svg'); ?>
			<span>賢女のオンライン集客アカデミー</span>
		</h1>
		<h2>こんなお悩みありませんか？</h2>
		<ul class="academy__onlineList">
			<li class="academy__onlineItem">忙しくて通えない</li>
			<li class="academy__onlineItem">子供がまだ小さくて外出ができない</li>
			<li class="academy__onlineItem">海外在住のため通うことが難しい</li>
			<li class="academy__onlineItem">自分のペースで学びたい</li>
		</ul>
		<?php echo file_get_contents(get_template_directory() . '/img/academy/online-triangle.svg'); ?>
		<h2>そんな女性起業家の皆さんへ</h2>
		<div>
			<span>＼いつでも・どこでも・何度でも／</span>
			<p>
				オンライン講座の内容が<strong>1</strong>年間お得に学べる<br />
				<strong>オンライン講座</strong>をご用意しました！
			</p>
		</div>
		<div class="academy__onlineMerit">
			<div class="academy__onlineMeritHeading"><?php echo file_get_contents(get_template_directory() . '/img/academy/academy-merit_heading.svg'); ?></div>
			<ul class="academy__onlinMeritList">
				<li class="academy__onlineMeritItem">
					<h3>いつでもどこでも<br />受講できる!</h3>
					<?php echo file_get_contents(get_template_directory() . '/img/icon_smartphone.svg'); ?>
				</li>
				<li class="academy__onlineMeritItem">
					<h3>3ヶ月間の<br />サポートメール付</h3>
					<?php echo file_get_contents(get_template_directory() . '/img/icon_mail.svg'); ?>
				</li>
				<li class="academy__onlineMeritItem">
					<h3>講義動画本数88本<br />の大ボリューム</h3>
					<?php echo file_get_contents(get_template_directory() . '/img/icon_video.svg'); ?>
				</li>
			</ul>
		</div>
		<div class="academy__onlineFlow">
			<div class="academy__onlineFlowHeading"><?php echo file_get_contents(get_template_directory() . '/img/academy/online-flow-heading.svg'); ?></div>
			<div>
				<ul class="academy__onlineFlowList">
					<li class="academy__onlineFlowItem">
						<h3 class="academy__onlineFlowHeading">Web申し込み</h3>
						<p class="online__flowParagrapy">お申込みフォームをクリックして、必要事項をご入力ください。<br />
							「info@smartbe8.com」より受付完了メールが届きます。
						</p>
					</li>
					<li class="academy__onlineFlowItem">
						<h3 class="academy__onlineFlowHeading">ご入金</h3>
						<p class="online__flowParagrapy">お申し込み後、48時間以内にご入金に関するご案内をお送りいたします。</p>
					</li>
					<li class="academy__onlineFlowItem">
						<h3 class="academy__onlineFlowHeading">受講スタート</h3>
						<p class="online__flowParagrapy">視聴開始となりましたらアドレスにパスワード付きの会員サイトURLをご送付させていただきます。PC、スマートフォンからオンライン上でお好きなときにご視聴いただくことが可能です。</p>
					</li>
				</ul>
			</div>
			<button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>セミナー情報はこちら</button>
		</div>
	</section>
</div><!-- id academy --->
</div><!-- END #main_col -->

<?php get_footer(); ?>