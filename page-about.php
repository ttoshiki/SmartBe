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

<div id="about">
	<div class="about_wrapper">
		<div class="about_study">
			<h3>SmartBeがご提供する女性のための学び</h3>
			<?php echo do_shortcode('[eo_fullcalendar]'); ?>
			<div class="about_study_box">
				<div class="about_stydy_box_ttlwrapper clearfix">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_img01.png">
					<div class="about_stydy_box_ttl">
						<h4>賢女の集客アカデミー</h4>
						<p>毎月10人の安定的な集客を可能にし、理想の収入を得るためのメソッドを半年かけて学べる、女性起業家のための学校。</p>
					</div>
				</div><!-- about_stydy_box_ttlwrapper -->
				<div class="about_stydy_box_ac">
					<div class="readmore_cont">
					<p>起業家が最初にぶつかる壁は集客と言えます。<br>
					また女性の一人起業家の場合、体力も限られているため効率的に集客をこなさなければ、理想の収益を出すことは難しいです。<br>
					<br>
					SmartBeが誇る、賢女の集客アカデミーでは150名を超える同じ志を持った仲間とともに、女性の強みを活かした集客の方法や売り上げの立て方を1から学ぶことができます。<br></p>
					<a href="<?php echo get_page_link(333);?>">お申し込み・お問い合わせはこちら</a>
					</div>
					<!-- <div class="openbtn">
						<div class="close">READ MORE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_readmore.png"></div>
						<div class="open">CLOSE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_close.png"></div>
					</div>-->
				</div><!-- about_stydy_box_ac -->
			</div><!-- about_study_box -->
			<div class="about_study_box">
				<div class="about_stydy_box_ttlwrapper clearfix">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_img02.png">
					<div class="about_stydy_box_ttl">
						<h4>インフLady</h4>
						<p>Instagram・YouTube・twitter、それぞれの使い方を学びながら、自らインフルエンサーとなり大きな影響力を持つ人材として成長できるコミュニティ</p>
					</div>
				</div><!-- about_stydy_box_ttlwrapper -->
				<div class="about_stydy_box_ac">
					<div class="readmore_cont">
					<p>世の中にSNSが広く浸透し、人々のコミュニケーション手段の1つとして、なくてはならないものと言っても過言ではないでしょう。<br>
					<br>
					そこでSmartBeではインフLadyというコミュニティを発足。<br>
					SNSの中でも、押さえておくべき</p>
						<ul>
							<li>Instagram</li>
							<li>YouTube</li>
							<li>twitter</li>
						</ul>
					<p>この3つの楽しみ方・正しい活用方法を、多くの仲間とともに学べる環境をご用意しました。コミュニティに参加すると、有名インフルエンサーや各SNSを知り尽くしたスペシャリストから直接指導を受けられるイベントに参加できたり、参加者同士でフォローしあって人脈を広げたり、SNSの醍醐味を存分に味わうことができます。<br>
					<br>
					出会いの場として楽しんだり、しっかり学んで自らインフルエンサーとなり高い影響力を掴んだり、ビジネスもプライベートも共に充実させられるサービスです。<br></p>
					<a href="https://www.facebook.com/groups/inflady/" target="_blank">コミュニティへの参加はこちらから</a>
					</div>
					<!-- <div class="openbtn">
						<div class="close">READ MORE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_readmore.png"></div>
						<div class="open">CLOSE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_close.png"></div>
					</div>-->
				</div><!-- about_stydy_box_ac -->
			</div><!-- about_study_box -->
			<div class="about_study_box">
				<div class="about_stydy_box_ttlwrapper clearfix">
					<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_img03.png">
					<div class="about_stydy_box_ttl">
						<h4>トータルビューティーを学ぶ</h4>
						<p>心と身体の両方が輝く、美の本質を身につけ、豊かに美しく生きる女性としての人間力を学びを通して高めるサービスを近日公開予定！</p>
					</div>
				</div><!-- about_stydy_box_ttlwrapper -->
				<div class="about_stydy_box_ac">
					<div class="readmore_cont">
					<p>女性として充実した人生を送るためには美しさが必須とSmartBeは考えます。<br>
					この美しさは外見だけでなく、もちろん心の美しさも指します。心も身体もトータルに磨いてこそ、女性は輝きを増すからです。しかし忙しい現代女性は多くの時間を美容に割くことは難しいのが現実です。<br>
					<br>
					そこでSmartBeでは、外見から中身、多岐に渡るテーマの中から自分に足りない部分だけを学べるミニセミナーや短期講座を多数開催予定！全女性の美をトータルにサポート致します。
					</p>
					</div>
					<!-- <div class="openbtn">
						<div class="close">READ MORE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_readmore.png"></div>
						<div class="open">CLOSE<img src="<?php echo get_template_directory_uri(); ?>/img/201909/about_close.png"></div>
					</div> -->
				</div><!-- about_stydy_box_ac -->
			</div><!-- about_study_box -->
		</div><!-- about_study -->
		<div class="about_link">
			<div class="about_link_inner clearfix">
				<div class="about_link_box">
					<h4>受講生の声</h4>
					<p>さらに詳しい声はこちらから</p>
					<a href="<?php echo get_page_link(52);?>">READ MORE</a>
				</div>
				<div class="about_link_box">
					<h4>よくあるご質問</h4>
					<p>セミナー参加希望の方や受講生から多く寄せられるご質問はこちらから</p>
					<a href="<?php echo get_page_link(58);?>">READ MORE</a>
				</div>
			</div>
		</div><!-- about_link -->
		<div class="about_sns">
			<h3>公式メールマガジン＆公式LINEアカウント</h3>
			<div class="about_sns_inner clearfix">
				<div class="about_sns_box_left">
					<p>SmartBeではメルマガとLINE@にて</p>
						<ul>
							<li>・Facebookを活用した集客テクニック</li>
							<li>・起業ノウハウ</li>
							<li>・起業のためのマインドアドバイス</li>
							<li>・メルマガ会員だけのシークレットイベント情報</li>
						</ul>
					<p>などなど、女性起業家に有益な情報を無料でご提供しています。<br>
					登録者数はメルマガとLINE@で延べ、1万人！<br>
					まずはここから新しい一歩を踏み出しませんか？</p>
				</div>
				<div class="about_sns_box_right">
					<div class="about_sns_mailmag">
						<h4>公式メールマガジン登録</h4>
						<p>メールマガジンを受け取るメールアドレスを入力して、送信ボタンを押してください。</p>
						<?php echo do_shortcode('[mwform_formkey key="346"]'); ?>
						</div>
					<div class="about_sns_line">
						<h4>公式LINEアカウント登録</h4>
						<p>友だち追加ボタンまたは、QRコードを読み取って友だち登録してください。</p>
						<div class="about_sns_line_inner clearfix">
							<a class="about_sns_line_btn" href="">友だち追加</a>
							<img class="about_sns_line_qr" src="<?php echo get_template_directory_uri(); ?>/img/201909/about_qr_img01.png">
						</div>
					</div>
				</div>
			</div>
		</div><!-- about_sns -->
	</div><!-- about_wrapper -->
</div><!-- id about --->

</div><!-- END #main_col -->

<?php get_footer(); ?>