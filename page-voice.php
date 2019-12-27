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

<div id="voice">
	<div class="voice_wrapper">
		<h4><?php the_title(); ?></h4>
		<ul class="modal_trigger clearfix">
			<li class="modal_btn over">
				<div class="modal_btn_inner clearfix">
					<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_01.png">
					<div class="modal_btn_inner_right">
						<h5>Facebook初心者でも2日で30人の満員御礼</h5>
						<p>大谷 美和さん（36歳）<br>
						ヘアメイクアーティスト</p>
					</div>
				</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_02.png">
						<div class="modal_btn_inner_right">
							<h5>起業がはじめての私でも3日で60人の集客に成功！</h5>
							<p>新井 りえさん（36歳）<br>
									イメージコンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_03.png">
						<div class="modal_btn_inner_right">
							<h5>14日間で継続商品が即売れ！34万円売上ました！</h5>
							<p>菅野 ゆり（29歳）<br>
									妊活コーチング</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_04.png">
						<div class="modal_btn_inner_right">
							<h5>競合が多いコーチング業界でも月収100万円を達成！</h5>
							<p>小林 舞依さん（33歳）<br>
								キャリアアップコーチ</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_05.png">
						<div class="modal_btn_inner_right">
							<h5>はじめての音楽活動に140人集客できました</h5>
							<p>行万里 さきさん（２９歳）<br>
								ヒーリングシンガーソングライター</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_06.png">
						<div class="modal_btn_inner_right">
							<h5>お茶会のノウハウを実行しただけで、増席した日もすぐ満席に</h5>
							<p>後藤有可子さん(47歳)<br>
								心理カウンセラー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_07.png">
						<div class="modal_btn_inner_right">
							<h5>子どもが2人いる私でもFacebookからのお申し込みで毎回満員御礼！</h5>
							<p>福島 すみれ様（34歳）<br>
								ローフードマイスター講師</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_08.png">
						<div class="modal_btn_inner_right">
							<h5>たった1ヶ月で前月比3倍を売上げました！</h5>
							<p>真高 栄子様（49歳）<br>
								リラクゼーションサロン経営</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_09.png">
						<div class="modal_btn_inner_right">
							<h5>商品を見直しただけで売上があっという間の3倍</h5>
							<p>石坂 道代様（49歳）<br>
								エステティックサロン「Lea Lea」経営</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_10.png">
						<div class="modal_btn_inner_right">
							<h5>売上5万円だった私が月商100万円を達成！夫婦仲も◎に♪</h5>
							<p>片岡 すみら様（38歳）<br>
								アメブロ集客コンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_11.png">
						<div class="modal_btn_inner_right">
							<h5>集客のツボとコツを学び2ヶ月で売り上げ4倍以上に！</h5>
							<p>高根澤 由史子様（47歳）<br>
								五臓美容家</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_12.png">
						<div class="modal_btn_inner_right">
							<h5>1カ月先まで予約が埋まる状態が続くようになりました！</h5>
							<p>姫野 則子様（42歳）<br>
								声紋分析心理学士</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_13.png">
						<div class="modal_btn_inner_right">
							<h5>講座生との関係がよくなり、4ヶ月で月商200万円までアップしました！</h5>
							<p>本多 聡美様（33歳）<br>ダイエットサロン専門コンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_14.png">
						<div class="modal_btn_inner_right">
							<h5>入塾して3ヶ月で販売商品完売＆講座も満席になりました！</h5>
							<p>中尾 真紀子様（51歳）<br>カレーインストラクター</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_15.png">
						<div class="modal_btn_inner_right">
							<h5>安定的に売上100万円を達成！メルマガ読者様も400人に♬</h5>
							<p>福田 早苗様（51歳）<br>集客コンサル兼着付け教室講師</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_16.png">
						<div class="modal_btn_inner_right">
							<h5>地方在住の私でも動画で学んだことで売上が2倍に！</h5>
							<p>渡邊 弘子様（45歳）<br>エステティシャン・ヨガインストラクター</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_17.png">
						<div class="modal_btn_inner_right">
							<h5>3ヶ月で売上100万超達成＆顧客数も100名を超えました！</h5>
							<p>新井 淳子様（50歳）<br>鍼灸師</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_18.png">
						<div class="modal_btn_inner_right">
							<h5>入塾してわずか2ヶ月後には月収100万円の壁を超えました！！</h5>
							<p>いとう しづ様（40歳）<br>イメージコンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_19.png">
						<div class="modal_btn_inner_right">
							<h5>キャッチコピーに沿って商品を作ったことで毎月目標金額以上の売上に！</h5>
							<p>池田 裕子様（50歳）<br>makeroomPALETTE経営（二の腕やせバストアップ）</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_20.png">
						<div class="modal_btn_inner_right">
							<h5>ゴールから逆算したプランに見直しただけで2日で40人も集客できました！</h5>
							<p>高木 つぐ美様（37歳）<br>在宅起業コンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_21.png">
						<div class="modal_btn_inner_right">
							<h5>普通の専業主婦から一転！起業してたった6ヶ月で100万円達成！！</h5>
							<p>岡 麻美様（48歳）<br>インスタグラム攻略講座主宰</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_22.png">
						<div class="modal_btn_inner_right">
							<h5>毎月開催するお茶会・ランチ会が毎回10名超の満席に！</h5>
							<p>つつみ たかえ様（51歳）<br>小顔セラピスト/肥満予防健康管理士</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_23.png">
						<div class="modal_btn_inner_right">
							<h5>ニッチな商品でも素直に行動したことで450万円の売上ができました！</h5>
							<p>高橋 満美様（47歳）<br>開運オルゴナイトナビゲーター講師</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_24.png">
						<div class="modal_btn_inner_right">
							<h5>生徒さんゼロの状態だった教室から売上7桁の教室になりました。</h5>
							<p>池原 晴美様（53歳）<br>天然石ワイヤージュエリー教室主宰</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_25.png">
						<div class="modal_btn_inner_right">
							<h5>認知があがりメルマガ読者様1000人達成しました！</h5>
							<p>津田 由加里様（43歳）<br>フラワーアレンジメント講師、格上げおしゃれプランナー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_26.png">
						<div class="modal_btn_inner_right">
							<h5>宏美さんの『即行動』を真似したことで入塾して半年間で500万円の売上に！</h5>
							<p>岩崎 幸恵様（55歳）<br>運命自動操縦カウンセラー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_27.png">
						<div class="modal_btn_inner_right">
							<h5>お茶会やセミナーを開催したことなかった私が入塾して4ヶ月で売上160万円超に。今では毎回満席御礼！！</h5>
							<p>菊地 美香様（44歳）<br>栄養カウンセラー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_28.png">
						<div class="modal_btn_inner_right">
							<h5>亀のようにノロマだった私でも行動することで過去最高月商を達成！！</h5>
							<p>佐竹 由梨亜様（30歳）<br>個人ダイエットサロン</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_29.png">
						<div class="modal_btn_inner_right">
							<h5>入塾後すぐに実施したキャンペーンで約500万円の売上を達成！！</h5>
							<p>安宅 杏樹様（54歳）<br>セミナー講師、才能発掘コンシェルジュ</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_30.png">
						<div class="modal_btn_inner_right">
							<h5>諦めず継続したら人生初の売上100万円超を達成！！</h5>
							<p>平綿 香様（45歳）<br>体型分類 黄金ボディメイクトレーナー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_31.png">
						<div class="modal_btn_inner_right">
							<h5>亀の歩みの私でも集客アドバイスをして既存のお客様の売上を倍に！！</h5>
							<p>伊勢谷 暁様（52歳）<br>Webブランディングプランナー</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_32.png">
						<div class="modal_btn_inner_right">
							<h5>Facebook投稿を楽しくできるようになったら4ヶ月で160万円売上げました！</h5>
							<p>永川 愛美様（35歳）<br>ファッションコンサルタント</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
			<li class="modal_btn over">
					<div class="modal_btn_inner clearfix">
						<img class="modal_btn_inner_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_33.png">
						<div class="modal_btn_inner_right">
							<h5>開店休業状態から半年で116万円の売上達成！自社商品も270組売れるほど人気商品に！</h5>
							<p>越智 紫様（55歳）<br>アーユルヴェーダティチャー兼オリジナルニット道具製作販売</p>
						</div>
					</div>
				<div class="modal_btn_more">READ MORE</div>
			</li><!-- modal_btn -->
		</ul>

		<div class="modal_area">
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_01.png">
						<div class="modal_inner_in_right">
							<h5>Facebook初心者でも2日で30人の満員御礼</h5>
							<p class="prof">大谷 美和さん（36歳）ヘアメイクアーティスト</p>
							<p>お客さまからのご紹介だけでヘアメイク15年間やってきました。もっとビジネスを拡大するにはSNSを使って新規のお客さまを獲得しなくては…と思っていたときに宏美さんを知り、一からビジネスを学ぼうと決意しました。私はメイク学校の講師でもあるのでメイクに関することはなんでもできます。しかし“なんでもできる”はお客さまに選ばれにくいことを知り、専門分野に特化したアプローチでFacebookに発信した結果、驚くようなことがおきました。なんとFacebookをほとんど活用できていなかった私が『2日間で30人・満員御礼』ができたのです！宏美さんは教え方が上手なことと会話に無駄がないので初心者の私でもこのように結果を出すことができました！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_02.png">
						<div class="modal_inner_in_right">
							<h5>起業がはじめての私でも3日で60人の集客に成功！</h5>
							<p class="prof">新井 りえさん（36歳）イメージコンサルタント</p>
							<p>会社員をしながら週末起業というかたちで、大好きなイメージコンサルタントの仕事をしようと決意しました。しかし、決めたはいいものの、起業するために何から手をつけてよいか分からなくて…そんなときに宏美さんに出会いました。宏美さんのすごいところは『モチベーションを維持してくれる』ところ！起業できるかな？集客できるかな？と毎日不安でしたが、いつも励まし具体的な行動を手取り足取り教えてくれる。その結果、はじめてのカラー診断講座は3日間で60人のお申し込みがあり本当に感謝です！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_03.png">
						<div class="modal_inner_in_right">
							<h5>14日間で継続商品が即売れ！34万円売上ました！</h5>
							<p class="prof">菅野 ゆりさん（29歳）妊活コーチング</p>
							<p>看護師時代、多くの女性が妊活で悩む姿をみて、その心の支えになりたいと思い妊活コーチとして独立しました。まずはFacebookから！と始めましたが、投稿の仕方も分からず集客もできず、困っていました。しかし、宏美さんのアドバイスを実行した結果、集客がアップしたことと、なんと14日間で妊活コーチング継続コースが即売れ、34万円を売上げました！もうビックリです！宏美さんのすごさは「Facebookの捉え方」です。ただ投稿やブランディングのためではなく、戦略と分析に基づいて活用されていること。私自身、看護師だけの経験でしたので起業に対するマインドまでも学ぶことができ、これから起業家としてどんどん成長したいと思います！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_04.png">
						<div class="modal_inner_in_right">
							<h5>競合が多いコーチング業界でも月収100万円を達成！</h5>
							<p class="prof">小林 舞依さん（33歳）キャリアアップコーチ</p>
							<p>宏美さんのお茶会に行ったのは、ちょうど通信会社の人材育成を担当していた頃。SNSも仕事に活かせたらいいなぁ程度に入塾しました。しかし入塾から僅か半年で会社を退職！さらに競合が多いコーチ業で独立！！しかし開校した講座はすぐにキャンセル待ち状態となり、3ヶ月で100万円を達成しました。<br>
							宏美さんからは起業のノウハウだけでなく、一緒に泣き一緒に笑ってくれる環境をいただきました。出来てるところはたくさんの承認、課題があるところは具体的なアドバイスをいただける、理想的な起業塾です！！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_05.png">
						<div class="modal_inner_in_right">
							<h5>はじめての音楽活動に140人集客できました</h5>
							<p class="prof">行万里 さきさん（29歳）ヒーリングシンガーソングライター</p>
							<p>音楽活動もビジネスと一緒で売上が上がらなければ継続できないと思ったため、まずは集客を先に学ぼうと思い宏美さんのコンサルティングを受けました。元々看護師であった私はビジネスマインドが一切ありませんでしたが、6ヶ月間学んだ結果、なんとライブに140人集客できました！またファンの方もでき安定的なリピートも起こせるようになったことが嬉しいです。宏美さんのサポート体制は本当に細かく、そして塾生同士で応援し合える関係もこの塾ならではだと感じました！特に私は音楽というちょっと難しい集客でしたが、みなさんの協力もあって不安になることもなく楽しく学べています！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_06.png">
						<div class="modal_inner_in_right">
							<h5>お茶会のノウハウを実行しただけで、増席した日もすぐ満席に</h5>
							<p class="prof">後藤有可子さん(47歳) 心理カウンセラー</p>
							<p>口コミだけでお仕事をしてきましたが、新規のお客さまを広げた、ブログを使ってお茶会を開催するもなかなか集客できず1年近く悩んでいる状態でした。 そこで、以前宏美さんとお会いしたことがあったので、本格的に集客を学ぼうと入塾しました。入塾して2ヶ月目に開催したお茶会がなんと次の日には満員御礼。そして増席するも即日に満員御礼となりました。これは教え方にポイントがあり、女性ならではの戦略が隠されています。宏美さんは行動すればするほど次のステップに進めるように指導もしてくれます。毎日不安でしたが細かい配慮とアドバイスのおかげで、結果を出すことができました。これからもどんどん、結果を残していきたいと思います。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_07.png">
						<div class="modal_inner_in_right">
							<h5>子どもが2人いる私でもFacebookからのお申し込みで毎回満員御礼！</h5>
							<p class="prof">福島 すみれ様（34歳）ローフードマイスター講師</p>
							<p>集客の1つとしてSNSを使う方が多いですが、数ある中から何をどのように使ってビジネスに役立て成果を出していくかを学びたくてコンサルを受講しました。今までは複数のSNSを使うだけでも四苦八苦していたのに、今では優先順位がはっきりし、子供が2人いても毎日1回は必ず投稿出来るようになりました。その結果、SNSを通して講座のお申し込みを頂くようになりました！！さらに宏美さんのすごいところは、SNSのやり方だけでなく、人生において大切なものに気づかせてくれるというところです！本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_08.png">
						<div class="modal_inner_in_right">
							<h5>たった1ヶ月で前月比3倍を売上げました！</h5>
							<p class="prof">真高 栄子様（49歳）リラクゼーションサロン経営</p>
							<p>サロンをオープンして1年が経ちましたが、口コミとご紹介でここまできました。果たして2年目は続くのか…と悩んでいたところ、友人からの紹介で宏美さんにお会いしました。宏美さんからSNSを使って長く安定する仕組みづくりをしっかり教えてもらったところ『前月比3倍の売上の79万円』という過去最高売上を達成することができました！今まで口コミでしたのでSNSはまだ慣れてはいませんが、行動する事で夢を現実に近づける最短を教えていただけ感謝しています。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_09.png">
						<div class="modal_inner_in_right">
							<h5>商品を見直しただけで売上があっという間の3倍</h5>
							<p class="prof">石坂 道代様（49歳）エステティックサロン「Lea Lea」経営</p>
							<p>口コミで今までやってきましたが、もっと事業を拡大するには新規のお客様にもお越しいただきたいと思い、集客と全ての商品を見直しました。実はエステを経営して数十年ですが…価格を変えたことがありませんでした。宏美さんと売れる商品を一緒に考えた結果、売り上げが3倍と変化しました！宏美さんの凄さは用意されているデータが緻密。それをこと細かく説明してくださるので本当に心強かったです。そしてわからないところを聞けば個々に答えをくれる。ありがとうございます！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_10.png">
						<div class="modal_inner_in_right">
							<h5>売上5万円だった私が月商100万円を達成！夫婦仲も◎に♪</h5>
							<p class="prof">片岡 すみら様（38歳）アメブロ集客コンサルタント</p>
							<p>起業塾に何カ所か通い、ブログを使ってお茶会やセミナーなどは開催していたのですが、なかなか売上が確立出来ず悩んでいたところ、宏美さんのお茶会を目にして参加。「この人はキラキラしているだけの起業女子じゃない」と確信して宏美さんのコンサルを受けようと思いました。宏美さんはFacebook集客のことだけではなく、ビジネスをする上でのマインドについてや戦略などたくさんのことを教えて頂きました。その結果、売上5万円いかなかった私が100万円を越えることが出来るように！！<br>
							それだけではなく、日常生活も毎日楽しいと思えるようになり、充実した毎日を送れるようになったからか「変わったね」と言われることが多くなりました！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_11.png">
						<div class="modal_inner_in_right">
							<h5>集客のツボとコツを学び2ヶ月で売り上げ4倍以上に！</h5>
							<p class="prof">高根澤 由史子様（47歳）五臓美容家</p>
							<p>今までSNSを活用せずにリアルのみで仕事をしてきましたが、ビジネスの拡大にはSNSが必要と思っていたました。宏美さんの緻密なデータと実績をもとに集客のツボとコツを丁寧に教えていただいたおかげで、2ヶ月目から売上が250万円に！さらには会社を設立することもでき、本当に感謝しています。<br>
							また宏美さんのまわりには素晴らしい経営者が多く、たくさんの人脈もご紹介いただき私では出会えなかった人と会うことで事業拡大にもつながりました。ビジネスノウハウと人脈をここまで提供してくださったことに本当に感謝です！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_12.png">
						<div class="modal_inner_in_right">
							<h5>1カ月先まで予約が埋まる状態が続くようになりました！</h5>
							<p class="prof">姫野 則子様（42歳）声紋分析心理学士</p>
							<p>声紋分析というニッチな商品の特性上、どうすればみなさんに知ってもらえるか全く分からない状態でしたが、宏美さんからビジネスマインドや集客、マーケティングなどを学ぶことで方向性が定まり、行動が一気に加速しました。以前は、SNSで発信すれば集客できると思っていた私ですが、実際はそんなに簡単なことではなく、Facebookの正しい使い方を教えていただき、毎日のFacebook投稿の内容を見直し発信していくことで口コミやリピートが起こり、1カ月先まで予約が埋まる状態が続くようになりました。そしてアカデミーに入ってからの5カ月で、気づけばお客様の数は100名を優に超えることができました！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_13.png">
						<div class="modal_inner_in_right">
							<h5>講座生との関係がよくなり、4ヶ月で月商200万円までアップしました！</h5>
							<p class="prof">本多 聡美様（33歳）ダイエットサロン専門コンサルタント</p>
							<p>入塾前は売上も集客も不安定な状態で、自分が主宰しているアカデミーをどのように拡大したいか悩んでいました。そんなときFacebookで宏美さんを知り、拡散力の凄さ、そしてチームを大切にする考えに共感し即入塾を決めました。学びを実践したこと、入塾から4ヶ月で月商200万を達成することができました。これはノウハウだけではなく、宏美さんから発せられるアカデミー生への愛や、チームをまとめる力などのマインドもたくさん学びとても感謝しています！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_14.png">
						<div class="modal_inner_in_right">
							<h5>入塾して3ヶ月で販売商品完売＆講座も満席になりました！</h5>
							<p class="prof">中尾 真紀子様（51歳）カレーインストラクター</p>
							<p>子育てを終えやりたいと思っていたことを始めよう思った時、やるからにはきちんとしたやり方を学び結果を出したいという気持ちから受講を決意しました。これまで自己流だったやり方をしっかり学び行動したことで、入塾して3ヶ月で販売商品が完売になったり、講座が満員御礼となりました。アカデミーで学んだことがちゃんと結果に繋がり入塾して本当に良かったです！宏美さん本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_15.png">
						<div class="modal_inner_in_right">
							<h5>安定的に売上100万円を達成！メルマガ読者様も400人に♬</h5>
							<p class="prof">福田 早苗様（51歳）集客コンサル兼着付け教室講師</p>
							<p>SNSを女性のコンサルタントの方から学びたいと思った時に宏美さんと出会いました。「かゆいところに手が届く」アカデミーの講座内容に毎回助けられながらも、入塾してから9ヶ月平均売上100万円を達成することができました！メルマガにも初挑戦し、教わったことを素直にやったことで読者登録が400名に！宏美さんのコミュニティは本当に素晴らしいです。私も宏美さんのような愛のある商品をこれからも作っていきたいと思います。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_16.png">
						<div class="modal_inner_in_right">
							<h5>地方在住の私でも動画で学んだことで売上が2倍に！</h5>
							<p class="prof">渡邊 弘子様（45歳）エステティシャン・ヨガインストラクター</p>
							<p>エステ歴20年・ヨガ歴10年の経験を活かしエステサロンとヨガスタジオを経営していますが、集客と売上アップを勉強したくてアカデミーに入塾しました。地方から東京へ通うことがなかなか難しくとても不安でしたが、充実すぎるカリキュラムと講義動画がとても心強く不安が解消されました。結果、順調に売上を伸ばすことができ集客もスムーズとなったことで開催したイベントでは売上が2倍になりました！アカデミーのお得なカリキュラムが、地方在住の私でも着実に結果を出すことができました。本当に素晴らしいアカデミーとカリキュラム内容だと思います！！本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_17.png">
						<div class="modal_inner_in_right">
							<h5>3ヶ月で売上100万超達成＆顧客数も100名を超えました！</h5>
							<p class="prof">新井 淳子様（50歳）鍼灸師</p>
							<p>鍼灸師歴12年という経歴を持つものの集客ができずに困っていたところに宏美さんと出会い入塾しました。広告が出せない状況だった私が、Facebook集客を学んだことでどんどん売上が上がり、入塾してたった3ヶ月で100万の売上達成となりました！！宏美さんやアカデミー生と出会い、みんなのお力添えがあったから達成することができました。本当に嬉しくて入塾してよかったです。心から感謝しています！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_18.png">
						<div class="modal_inner_in_right">
							<h5>入塾してわずか2ヶ月後には月収100万円の壁を超えました！！</h5>
							<p class="prof">いとう しづ様（40歳）イメージコンサルタント</p>
							<p>これまで自宅サロンで仕事をしてきましたが、駅前にオフィスを構えることをきっかけにビジネスについて学ばないと…という思いから宏美さんと出会い入塾しました。ビジネスの仕組みについてしっかり学びそれをちゃんと実行したことで、入塾してわずか2ヶ月で月収100万円を超える売上となりました！これまで超えることができなかった壁が入塾したことで達成することができ本当に信じられません！！宏美さんと出会いアカデミーに入ったことで私のビジネスが前進しました！これからもどんどん加速していきます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_19.png">
						<div class="modal_inner_in_right">
							<h5>キャッチコピーに沿って商品を作ったことで毎月目標金額以上の売上に！</h5>
							<p class="prof">池田 裕子様（50歳）makeroomPALETTE経営（二の腕やせバストアップ）</p>
							<p>ウェディングヘアメイク歴25年の経歴を活かしてサロンを経営していますが、これからはSNSを使った集客も勉強する必要があると感じ始め、サロンのお客様に誘われて宏美さんのセミナーへ参加したことで宏美さんを知りました。セミナーが思っていた以上にすごくて「この人に教えてもらいたい！」という強い思いから即入塾をしたことを覚えています。サロンに合うキャッチコピーを宏美さんが考えてくださりそれに沿って商品を作ったところ、毎月目標としている金額以上の売上を出すことができました！今ではSNS集客でもお客様が増え活躍の幅が広がりました。キャッチコピーがどれだけ大切なのかを知ることができ本当に感謝しています。ありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_20.png">
						<div class="modal_inner_in_right">
							<h5>ゴールから逆算したプランに見直しただけで2日で40人も集客できました！</h5>
							<p class="prof">高木 つぐ美様（37歳）在宅起業コンサルタント</p>
							<p>起業の基本を見直したくて起業塾を探していたところ、宏美さんの圧倒的な実績と行動力、そして学びにたくさんの投資をされている姿に惚れてしまい入塾しました。基本を学び直すって本当に大事ですね！宏美さんから教わった行動計画やビジネスモデルを真似て、ゴールから逆算したプランに変更しただけで2日で40人も集客することができました！学んだことをただ実践しただけなの本当に嬉しいです！アカデミーの素晴らしいところは、講座以外にもランチ会を開催して塾生同士の交流を深めたり、PCが不得意な方向けの講座があったりと本当にサポート面でも心強いです。こんな素晴らしいアカデミーに出会えて本当に良かったです。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_21.png">
						<div class="modal_inner_in_right">
							<h5>普通の専業主婦から一転！起業してたった6ヶ月で100万円達成！！</h5>
							<p class="prof">岡 麻美様（48歳）インスタグラム攻略講座主宰</p>
							<p>これまで専業主婦として過ごしてきた私ですが、自立した人間になりたいという思いから宏美さんの塾へ入りました。専業主婦が起業するなんて…と思う方もいるかもしれませんが、ちゃんと起業家としてのマインドを学びその上で必要なスキルを学んだことで、入塾してたった6ヶ月で売上100万円を達成することができました！最初はとても不安でしたが、宏美さんから教わったことをその通りにやった結果が数字となって本当に嬉しいです。アカデミーは、ノウハウ面だけでなく、塾生同士の繋がりも強くてみんなで応援し合えるとても素敵な場所です。それこそが価値であり財産だと私は思います！！自立できたことにとても感謝しています。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_22.png">
						<div class="modal_inner_in_right">
							<h5>毎月開催するお茶会・ランチ会が毎回10名超の満席に！</h5>
							<p class="prof">つつみ たかえ様（51歳）小顔セラピスト/肥満予防健康管理士</p>
							<p>これまで私のお茶会・ランチ会は、集まってただお茶やランチを楽しむだけのものでした。どうやったら楽しみながらもマネタイズができるのかわからなくて、お茶会・ランチ会を安定的に集客している宏美さんを知り入塾しました。Facebookでのお茶会開催の集客方法を学びそれを実践したことで、なんと毎月開催するお茶会・ランチ会・夜会にも毎回10名以上のお申し込みが入り満席御礼になりました！！マネタイズもできるようになり今では年間200名超の集客に成功しています！！アカデミーで学んだことを素直に行動したことで、できないことができるようになりました！本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_23.png">
						<div class="modal_inner_in_right">
							<h5>ニッチな商品でも素直に行動したことで450万円の売上ができました！</h5>
							<p class="prof">高橋 満美様（47歳）開運オルゴナイトナビゲーター講師</p>
							<p>オルゴナイトをみなさんに知ってもらいたい！そんな強い思いがあってもニッチな商品ということもありなかなか知ってもらう方法がわかりませんでした。でも宏美さんはオルゴナイトを知っていてくださり宏美さんだったら女性目線のアドバイスもいただけると確信しそれが決め手で入塾しました。48時間以内に学びを実行するという宏美さんの教えを素直に実践したことでニッチな商品でも450万円もの売上を出すことができました！今ではFacebookでワークショップの開催投稿をしただけでドンドン予約が入るほどです。宏美さんの女性ならではの的確なアドバイスや気づき満載の講座のおかげです。本当にありがとうございます！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_24.png">
						<div class="modal_inner_in_right">
							<h5>生徒さんゼロの状態だった教室から売上7桁の教室になりました。</h5>
							<p class="prof">池原 晴美様（53歳）天然石ワイヤージュエリー教室主宰</p>
							<p>ジュエリーデザイン教室を開くも生徒さんが全然集まらず集客にとても悩んでいました。これからはSNSを使った集客も必要だと感じしっかり集客方法を学びたいと思い入塾しました。遠方からの受講なため最初は不安な気持ちや戸惑うこともありましたが、宏美さんから教わった集客方法やアドバイスをいただきそれを実践した結果、生徒さんがいなかったゼロの状態から10人もの生徒さんが受講してくれるまでになりました。売上も7桁を達成し自分でも驚きです！アカデミーには私のように遠方から来ている方も多くいて心強かったですし、リアル講座だけでなく動画でも予習復習ができるという充実すぎる環境が私を変えてくれました。ありがとうございます！！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_25.png">
						<div class="modal_inner_in_right">
							<h5>認知があがりメルマガ読者様1000人達成しました！</h5>
							<p class="prof">津田 由加里様（43歳）フラワーアレンジメント講師、格上げおしゃれプランナー</p>
							<p>フラワー講師として自宅でリース教室を開いていますが、もっと認知を広め集客ができるようになりたいという思いと宏美さんのノウハウを学びたくて入塾しました。メルマガ初挑戦の私でも嬉しいことにメルマガからのお申し込みが入ったり自宅で開催する講座が常に満席御礼に。さらにメルマガ登録も1000人の方からご登録をいただき目標を達成することができました！！アカデミーに入ったことでより活動の幅が広がり応援し合える仲間と出会えたことが本当に嬉しいです。宏美さんはご自身の経験からも私たちに色々な情報と知識を伝えてくれます。こんな素晴らしい塾があることをもっと知ってもらいたいと思いました！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_26.png">
						<div class="modal_inner_in_right">
							<h5>宏美さんの『即行動』を真似したことで入塾して半年間で500万円の売上に！</h5>
							<p class="prof">岩崎 幸恵様（55歳） 運命自動操縦カウンセラー</p>
							<p>宏美さんの人と人を繋いでいくパワフルなところ、そして、周りに有益な情報をどんどん惜しみなく提供される素晴らしい人柄に惹かれて入塾しました。これまで後回しにする事が多かったことを、とにかく宏美さんの真似で即行動することを習慣化したことで、さらにビジネスが加速し、半年間で売上が500万円になりました。宏美さんは、講師と生徒の壁を取り払い、受講生みんなが楽しみながら、成果を上げていくイベントを次々と企画してくれます。困った事は親身になって相談にものってくれ本当に力強い味方です。だからこそ、受講生も結果を出す事が出来るんだなと感じています。賢女の集客アカデミーは、女性起業家にとって本当に素晴らしい塾です。宏美さんいつもありがとうございます！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_27.png">
						<div class="modal_inner_in_right">
							<h5>お茶会やセミナーを開催したことなかった私が入塾して4ヶ月で売上160万円超に。今では毎回満席御礼！！</h5>
							<p class="prof">菊地 美香様（44歳）栄養カウンセラー</p>
							<p>宏美さんの個別セッションを受けてみたいという気持ちと、女性起業家とつながりを持ちたいという思いから、成果を出している女性起業塾を探していた中で賢女のアカデミーを知り入塾しました。入塾時は、セミナーやお茶会を開催した事がなかった私ですが、アカデミーで学んだ「お茶会の作り方」を参考に開催したところお茶会は毎回満席！！。さらにキャンセル待ちも出るようになりました！入塾して4ヶ月でセミナーとお茶会にご参加くださった方がのべ80名以上となり売上も160万円を超えました！本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_28.png">
						<div class="modal_inner_in_right">
							<h5>亀のようにノロマだった私でも行動することで過去最高月商を達成！！</h5>
							<p class="prof">佐竹 由梨亜様（30歳）個人ダイエットサロン</p>
							<p>個人でダイエットサロンを運営しており、「エステサロンの集客＝ホットペッパー｣という時代もあり、これまでホットペッパーで集客をしていましたが、SNSでの集客方法をしっかり学びたい！という思いからアカデミーへ入塾しました。宏美さんが先陣をきって、積極性や行動量、マインド面をみせてくださるおかげで、亀のようにノロマだった私も入塾して3ヶ月目で過去最高月商を達成することができました！さらにアカデミーで学んだことを実践したことで、お客様の笑顔が増え距離も近くなり信頼関係が強くなりました。宏美さんの熱量と、同じ志をもち高め合える仲間に出会えて感謝です。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_29.png">
						<div class="modal_inner_in_right">
							<h5>入塾後すぐに実施したキャンペーンで約500万円の売上を達成！！</h5>
							<p class="prof">安宅 杏樹様（54歳）セミナー講師、才能発掘コンシェルジュ</p>
							<p>女性のための女性による集客講座に興味を持ち、また幅広い女性の起業を対象にパワフルなイベント展開もされている宏美さんに惹かれ入塾しました。女性に向けたわかりやすい講座で、細かいところまで丁寧に指導してくださったことで、入塾後すぐに実施したキャンペーンで５００万円近い売り上げをあげることができました！！パワフルな女性起業家の人脈が増え常に励まされています。宏美さんいつもありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_30.png">
						<div class="modal_inner_in_right">
							<h5>諦めず継続したら人生初の売上100万円超を達成！！</h5>
							<p class="prof">平綿 香様（45歳）体型分類 黄金ボディメイクトレーナー</p>
							<p>集客・売上に伸び悩んでいた時、宏美さんのセミナーに参加しました。集客・売上はもちろんのことマーケティング戦略や事業計画の細やかな内容に対して自分が学びたい事と一致していたので入塾しました。2019年11月までに月収100万円の売上を達成させるという目標を立てた私は、なんと4月の時点で月収136万円を売上げ、人生初の100万円超の売上を達成することができました！！アカデミーで学んだことをただひたすら素直に聞き、聞いたら考えをまとめ、行動を加速し継続させた結果だと思っています。それを教えてくれた宏美さんに感謝です！！</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_31.png">
						<div class="modal_inner_in_right">
							<h5>亀の歩みの私でも集客アドバイスをして既存のお客様の売上を倍に！！</h5>
							<p class="prof">伊勢谷 暁様（52歳）Webブランディングプランナー</p>
							<p>これまで紹介のみでデザインの仕事をしていましたが、クライアントさんの「Facebookで集客したい」というご要望にお応えしたく入塾しました。特に自分の商品がないところからのスタートでしたが、講座を受けていくうちに「私も講座できるかも？」と思い、アカデミーで教わったことの中から一つずつ実行しました。読む専門だった私のFacebookが激変したのを見たクライアントさんから、ホームページのお仕事だけでなく、集客のアドバイスもして欲しいとのご依頼が来るほどに！亀の歩みのようにのんびりと活動をしている私でも既存のお客様からの売上が倍に！！そして仲間のおかげで自分の講座もスタートできて見える景色が変わりました。宏美さんの作る愛あふれるコミュニティに集まる仲間はとても仲良し。お互いにアドバイスをしあって、共に成長できる仲間と出会えて本当に嬉しいです。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_32.png">
						<div class="modal_inner_in_right">
							<h5>Facebook投稿を楽しくできるようになったら4ヶ月で160万円売上げました！</h5>
							<p class="prof">永川 愛美様（35歳）ファッションコンサルタント</p>
							<p>Facebook投稿がとても楽しくなく、やりたくないと思っていたところに宏美さんに出会いました。SNS投稿を楽しくできるようになりたいという思いと、賢女アカデミーの皆さんの雰囲気が良かったため入塾を決めました。今ではFacebookの投稿を見てご依頼くださる方もたくさんいて楽しく投稿しています！投稿を続けたことで2019年3月から7月までのわずか4カ月でなんと売上が160万円になりました！！楽しくないと思っていたあの時に諦めなくてよかった！！宏美さん本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
			<div class="modal_box">
				<div class="modal_bg"></div>
				<div class="modal_inner">
					<div class="modal_close">&times;</div>
					<div class="modal_inner_in clearfix">
						<img class="modal_inner_in_left" src="<?php echo get_template_directory_uri(); ?>/img/201909/voice_33.png">
						<div class="modal_inner_in_right">
							<h5>開店休業状態から半年で116万円の売上達成！自社商品も270組売れるほど人気商品に！</h5>
							<p class="prof">越智 紫様（55歳）アーユルヴェーダティチャー兼オリジナルニット道具製作販売</p>
							<p>アーユルヴェーダの教室とオリジナル編み物道具の製作販売を運営。どちらも取扱商品が専門性が高く一部のマニア向けなため、売上が思うように上がらず開店休業状態が続いていました。SNSを使った、集客や告知・販売の具体的なマーケティングを学びたいと思い入塾を決意。入塾後、教えていただいたことを実践した結果、わずか半年で「ソックスブロッカー」という商品が270組売れ116万円の売上に！また、アーユルヴェーダの教室も受講生が増え教室だけでも80万円以上の売上を達成。さらに、今まで表に出ることが苦手だった私が、『Podcast』というネットラジオ放送にも挑戦し、放送開始わずか2ヶ月で総合順位16位に！仲間同士の助け合いや的確な宏美さんのアドバイスが、自分の中の「思い込み」や「苦手意識」を取ることができ、発想の転換や新しい挑戦をする事ができました！本当にありがとうございます。</p>
						</div>
					</div>
				</div>
			</div><!-- modal_box -->
		</div><!-- modal_area -->
	</div>
</div><!-- id voice --->

</div><!-- END #main_col -->

<?php get_footer(); ?>