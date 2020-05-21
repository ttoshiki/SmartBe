<?php
    $dp_options = get_desing_plus_option();

    global $header_slider;
    $header_slider = array();

    // 画像スライダー
    if ($dp_options['header_content_type'] == 'type1') {
        for ($i = 1; $i <= 5; $i++) {
            if (!is_mobile()) {
                $image = wp_get_attachment_image_src($dp_options['slider_image'.$i], 'full');
            } else {
                $image = wp_get_attachment_image_src($dp_options['slider_image_mobile'.$i], 'full');
            }
            if (!empty($image[0])) {
                $header_slider['header_content_type'] = 'type1';
                $header_slider['slider'][$i]['image'] = $image;
            }
        }

        // 動画
    } elseif ($dp_options['header_content_type'] == 'type2') {
        if ($dp_options['slider_video']) {
            $header_slider['header_content_type'] = 'type2';
            $header_slider['slider_video'] = wp_get_attachment_url($dp_options['slider_video']);
            $image = wp_get_attachment_image_src($dp_options['slider_video_image'], 'full');
            if (!empty($image[0])) {
                $header_slider['slider_video_image'] = $image;
            }
        }

        // youtube
    } elseif ($dp_options['header_content_type'] == 'type3') {
        if ($dp_options['slider_youtube_url']) {
            $header_slider['header_content_type'] = 'type3';
            $header_slider['slider_youtube_url'] = $dp_options['slider_youtube_url'];
            $image = wp_get_attachment_image_src($dp_options['slider_youtube_image'], 'full');
            if (!empty($image[0])) {
                $header_slider['slider_youtube_image'] = $image;
            }
        }
    }

    get_header();
?>
<div id="thumb-v" class="slider-pro">
  <div class="sp-slides">
    <div class="sp-slide">
      <img class="sp-image" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider01.jpg" data-small="<?php echo get_template_directory_uri(); ?>/img/top_slider01-sp.jpg" />
    </div>
    <div class="sp-slide">
      <img class="sp-image" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider02.jpg" data-small="<?php echo get_template_directory_uri(); ?>/img/top_slider02-sp.jpg" />
    </div>
    <div class="sp-slide">
      <img class="sp-image" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider03.jpg" data-small="<?php echo get_template_directory_uri(); ?>/img/top_slider03-sp.jpg" />
    </div>
    <div class="sp-slide">
      <img class="sp-image" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider04.png" data-small="<?php echo get_template_directory_uri(); ?>/img/top_slider04-sp.jpg" />
    </div>
    <div class="sp-slide">
      <img class="sp-image" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider05.jpg" data-small="<?php echo get_template_directory_uri(); ?>/img/top_slider05-sp.jpg" />
    </div>
  </div><!--/ sp-slides-->
  <div class="sp-thumbnails">
    <img class="sp-thumbnail" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider01.jpg"/>
    <img class="sp-thumbnail" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider02.jpg"/>
    <img class="sp-thumbnail" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider03.jpg"/>
    <img class="sp-thumbnail" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider04.png"/>
    <img class="sp-thumbnail" src="<?php echo content_url() ?>/themes/gensen_tcd050/img/top_slider05.jpg"/>
  </div>
<!--/ thumb-v--></div>
<?php
    // 画像スライダー
    if (!empty($header_slider['slider'])) :
?>
<div id="header_slider">
<?php
      $is_first_slide = true;
      foreach ($header_slider['slider'] as $i => $slider) :
        if ($dp_options['slider_url'.$i] && ($dp_options['use_slider_caption'.$i] == 0 || ($dp_options['use_slider_caption'.$i] == 1 && $dp_options['show_slider_button'.$i] == 0))) {
            $wrap_anchor = true;
        } else {
            $wrap_anchor = false;
        }
?>
 <div class="item item<?php echo esc_attr($i); ?>">
<?php   if ($wrap_anchor) { ?>
  <a href="<?php echo esc_attr($dp_options['slider_url'.$i]); ?>"<?php if ($dp_options['slider_target'.$i]) {
    echo ' target="_blank"';
} ?>>
<?php   } ?>
<?php   if ($dp_options['use_slider_caption'.$i] == 1) { ?>
   <div class="caption">
<?php
          if ($dp_options['slider_headline'.$i]) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_headline'.$i])).'</p>';
          }
          if ($dp_options['slider_caption'.$i]) {
              echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_caption'.$i])).'</p>';
          }
          if ($dp_options['show_slider_button'.$i] == 1 && $dp_options['slider_button'.$i] && $dp_options['slider_url'.$i]) {
              echo '<a class="button" href="'.esc_attr($dp_options['slider_url'.$i]).'"'.($dp_options['slider_target'.$i] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_button'.$i]).'</a>';
          } elseif ($dp_options['show_slider_button'.$i] == 1 && $dp_options['slider_button'.$i]) {
              echo '<div class="button">'.esc_html($dp_options['slider_button'.$i]).'</div>';
          }
?>
   </div><!-- END .caption -->
<?php   } ?>
<?php   if ($is_first_slide) {
    $is_first_slide = false; ?>
   <img src="<?php echo esc_attr($slider['image'][0]); ?>" alt="" />
<?php
} else { ?>
   <img data-lazy="<?php echo esc_attr($slider['image'][0]); ?>" alt="" />
<?php   } ?>
<?php   if ($wrap_anchor) { ?>
  </a>
<?php   } ?>
 </div><!-- END .item -->
<?php
      endforeach;
?>
</div><!-- END #header_slider -->
<?php
    // 動画
    elseif (!empty($header_slider['slider_video'])) :
      if (!wp_is_mobile()) : // if is pc
?>
<div id="header_slider" class="slider_video">
 <div class="slider_video_wrapper">
  <div id="slider_video" class="slider_video_container slider_video"></div>
 </div>
<?php   if ($dp_options['use_slider_video_caption'] == 1) { ?>
 <div class="caption">
<?php
          if ($dp_options['slider_video_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_headline'])).'</p>';
          }
          if ($dp_options['slider_video_caption']) {
              echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_caption'])).'</p>';
          }
          if ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button'] && $dp_options['slider_video_button_url']) {
              echo '<a class="button" href="'.esc_attr($dp_options['slider_video_button_url']).'"'.($dp_options['slider_video_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_video_button']).'</a>';
          } elseif ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button']) {
              echo '<div class="button">'.esc_html($dp_options['slider_video_button']).'</div>';
          }
?>
 </div><!-- END .caption -->
<?php   } ?>
</div><!-- END #header_slider -->
<?php elseif (!empty($header_slider['slider_video_image'][0])) : // if is mobile device?>
<div id="header_slider" class="slider_video_mobile">
 <div class="item">
  <img src="<?php echo esc_attr($header_slider['slider_video_image'][0]); ?>" alt="" title="" />
<?php   if ($dp_options['use_slider_video_caption'] == 1) { ?>
  <div class="caption">
<?php
          if ($dp_options['slider_video_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_headline'])).'</p>';
          }
          if ($dp_options['slider_video_caption']) {
              echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_video_caption'])).'</p>';
          }
          if ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button'] && $dp_options['slider_video_button_url']) {
              echo '<a class="button" href="'.esc_attr($dp_options['slider_video_button_url']).'"'.($dp_options['slider_video_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_video_button']).'</a>';
          } elseif ($dp_options['show_slider_video_button'] == 1 && $dp_options['slider_video_button']) {
              echo '<div class="button">'.esc_html($dp_options['slider_video_button']).'</div>';
          }
?>
  </div><!-- END .caption -->
<?php   } ?>
 </div><!-- END .item -->
</div><!-- END #header_slider -->
<?php
      endif;

    // youtube
    elseif (!empty($header_slider['slider_youtube_url'])) :
      if (!wp_is_mobile()) : // if is pc
?>
<div id="header_slider" class="slider_video">
 <div class="slider_video_wrapper">
  <div id="slider_video" class="slider_video_container slider_youtube"></div>
  <div id="slider_youtube" class="player youtube_video_player" data-property="{videoURL:'<?php echo esc_attr($header_slider['slider_youtube_url']); ?>',containment:'#slider_video',showControls:false,startAt:0,mute:true,autoPlay:true,loop:true,opacity:1,ratio:'16/9'}"></div>
 </div>
<?php   if ($dp_options['use_slider_youtube_caption'] == 1) { ?>
 <div class="caption">
<?php
          if ($dp_options['slider_youtube_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_headline'])).'</p>';
          }
          if ($dp_options['slider_youtube_caption']) {
              echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_caption'])).'</p>';
          }
          if ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button'] && $dp_options['slider_youtube_button_url']) {
              echo '<a class="button" href="'.esc_attr($dp_options['slider_youtube_button_url']).'"'.($dp_options['slider_youtube_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_youtube_button']).'</a>';
          } elseif ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button']) {
              echo '<div class="button">'.esc_html($dp_options['slider_youtube_button']).'</div>';
          }
?>
 </div><!-- END .caption -->
<?php   } ?>
</div><!-- END #header_slider -->
<?php elseif (!empty($header_slider['slider_youtube_image'][0])) : // if is mobile device?>
<div id="header_slider" class="slider_video_mobile">
 <div class="item">
  <img src="<?php echo esc_attr($header_slider['slider_youtube_image'][0]); ?>" alt="" title="" />
<?php   if ($dp_options['use_slider_youtube_caption'] == 1) { ?>
  <div class="caption">
<?php
          if ($dp_options['slider_youtube_headline']) {
              echo '<p class="headline rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_headline'])).'</p>';
          }
          if ($dp_options['slider_youtube_caption']) {
              echo '<p class="catchphrase rich_font">'.str_replace(array("\r\n", "\r", "\n"), '<br />', esc_html($dp_options['slider_youtube_caption'])).'</p>';
          }
          if ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button'] && $dp_options['slider_youtube_button_url']) {
              echo '<a class="button" href="'.esc_attr($dp_options['slider_youtube_button_url']).'"'.($dp_options['slider_youtube_button_target'] ? ' target="_blank"' : '').'>'.esc_html($dp_options['slider_youtube_button']).'</a>';
          } elseif ($dp_options['show_slider_youtube_button'] == 1 && $dp_options['slider_youtube_button']) {
              echo '<div class="button">'.esc_html($dp_options['slider_youtube_button']).'</div>';
          }
?>
  </div><!-- END .caption -->
<?php   } ?>
 </div><!-- END .item -->
</div><!-- END #header_slider -->
<?php
      endif;
    endif;
?>

<?php
    if ($dp_options['show_index_news']) :
      $args = array('post_type' => $dp_options['news_slug'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $dp_options['index_news_num']);
      $post_list = get_posts($args);
      if ($post_list) :
?>
<div id="index_news">
 <div class="inner">
  <div class="newsticker">
   <ol class="newsticker-list">
<?php     foreach ($post_list as $post) : setup_postdata($post); ?>
    <li class="newsticker-item">
     <a href="<?php echo the_permalink(); ?>"><span><?php if ($dp_options['show_index_news_date']) : ?><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><?php endif; ?><?php trim_title(50); ?></span></a>
    </li>
<?php   endforeach; wp_reset_postdata(); ?>
   </ol>
<?php   if ($dp_options['show_index_news_archive_link'] && $dp_options['index_news_archive_link_text']) : ?>
   <div class="archive_link">
    <a href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><?php echo esc_html($dp_options['index_news_archive_link_text']); ?></a>
   </div>
<?php   endif; ?>
  </div>
 </div>
</div><!-- index_news -->
<?php
      endif;
    endif;
    if ($dp_options['show_index_news_mobile']) :
      $args = array('post_type' => $dp_options['news_slug'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $dp_options['index_news_num_mobile']);
      $post_list = get_posts($args);
      if ($post_list) :
?>
<div id="index_news_mobile">
 <div class="inner">
  <ol>
<?php     foreach ($post_list as $post) : setup_postdata($post); ?>
   <li>
    <a href="<?php echo the_permalink(); ?>"><span><?php if ($dp_options['show_index_news_date_mobile']) : ?><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><?php endif; ?><?php trim_title(50); ?></span></a>
   </li>
<?php   endforeach; wp_reset_postdata(); ?>
  </ol>
<?php   if ($dp_options['show_index_news_archive_link_mobile'] && $dp_options['index_news_archive_link_text_mobile']) : ?>
  <div class="archive_link">
   <a href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><?php echo esc_html($dp_options['index_news_archive_link_text_mobile']); ?></a>
  </div><!-- archive_link -->
<?php   endif; ?>
 </div>
</div><!-- index_news_mobile -->
<?php
      endif;
    endif;
?>

<section class="front-page__catchCopy">
    <h1 class="front-page__text">起業やライフスタイルを<br class="sp">豊かにする<br />女性のための総合アカデミー</h1>
</section>

  <!-- original -->
  <section class="front-page__about">
    <h1 class="front-page__aboutHeading">好きを仕事にして、<br class="sp">経済的自立をしながら<br />自分らしい美しく豊かな<br class="sp">人生を生きるために</h1>
    <div class="front-page__aboutContents">
        <div class="front-page__aboutImage"><img src="<?php echo get_template_directory_uri(); ?>/img/top_about_image.svg" alt=""></div>
        <ul class="front-page__aboutTextWrapper">
            <li class="front-page__aboutTextItem">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/top_about_learn.svg" alt="学び">
                    <p class="front-page__aboutText">経済・マインド・時間的自立、この3つを習得し女性が自由な生き方を手に入れるためのセミナーを常時開催中です。まずはセミナーに参加して、あなたにピッタリの学びを見つけてください。</p>
                </div>
            </li>
            <li class="front-page__aboutTextItem">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/top_about_encounter.svg" alt="出会い">
                    <p class="front-page__aboutText">
                        集客アカデミーやスクールには、150人を超える同じ志を持った仲間が待っています。<br />
                        ともに学ぶことでモチベーション高く学べ、コミュニティの力も身につきます。
                    </p>
                </div>
            </li>
            <li class="front-page__aboutTextItem">
                <div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/top_about_future.svg" alt="未来">
                    <p class="front-page__aboutText">
                        学びを通して経済的自立や時間的余裕が手に入り、さらに多くの可能性が広がります。<br />
                        自分だけの美しい生き方を手に入れて、輝く人生を送りましょう。
                    </p>
                </div>
            </li>
        </ul>
    </div>
  </section>
  <section class="front-page__service">
    <h1 class="front-page__serviceHeading">Smart Beがご提供するサービス</h1>
    <ul class="front-page__serviceList">
        <li class="front-page__serviceItem">
            <h2 class="front-page__serviceName">アカデミー</h2>
            <?php echo file_get_contents(get_template_directory() . '/img/icon_academy.svg'); ?>
            <h3 class="front-page__serviceCatchCopy">一人ひとりに合わせた<br />再現性高い集客メソッド</h3>
            <p class="front-page__serviceContent">毎月10人の安定的な集客を可能にし、理想の収入を得るためのメソッドを、150人を超える同志と一緒に学べる女性起業家のための学校です。</p>
			<div class="m_botton"><a href="http://25works.sakura.ne.jp/smartbe/academy/">詳細はこちら</a></div>
        </li>
        <li class="front-page__serviceItem">
            <h2 class="front-page__serviceName">セミナー講座</h2>
            <?php echo file_get_contents(get_template_directory() . '/img/icon_seminar.svg'); ?>
            <h3 class="front-page__serviceCatchCopy">女性起業に必要なスキルを<br />短時間で学ぶ</h3>
            <p class="front-page__serviceContent">多岐に渡るテーマの中から、自分に足りない部分だけを半日で学べるミニセミナーや短期講座を多数開催しています。</p>
			<div class="m_botton"><a href="http://25works.sakura.ne.jp/smartbe/seminar-list/">詳細はこちら</a></div>
        </li>
        <li class="front-page__serviceItem">
            <h2 class="front-page__serviceName">オンライン講座</h2>
            <?php echo file_get_contents(get_template_directory() . '/img/icon_online_school.svg'); ?>
            <h3 class="front-page__serviceCatchCopy">女性起業のノウハウが<br />どこでも学べる</h3>
            <p class="front-page__serviceContent">88本の動画を365日24時間、国内外どこへいても学ぶことができます。忙しくてセミナーに参加できない、自由に学びたい方にはオススメです。</p>
			<div class="m_botton"><a href="https://peraichi.com/landing_pages/view/smart8online/">詳細はこちら</a></div>
        </li>
        <li class="front-page__serviceItem">
            <h2 class="front-page__serviceName">インフルエンサー育成</h2>
            <?php echo file_get_contents(get_template_directory() . '/img/icon_influencer.svg'); ?>
            <h3 class="front-page__serviceCatchCopy">SNSで大きな影響力を持つ<br />方法を身につける</h3>
            <p class="front-page__serviceContent">Instagram・YouTube・Twitter、それぞれの正しい活用方法を知り、SNSを自分の味方にして大きな影響力を持った人材として成長できます。</p>
			<div class="m_botton"><a href="http://25works.sakura.ne.jp/smartbe/inflady/">詳細はこちら</a></div>
        </li>
        <li class="front-page__serviceItem">
            <h2 class="front-page__serviceName">EXPO</h2>
            <?php echo file_get_contents(get_template_directory() . '/img/icon_expo.svg'); ?>
            <h3 class="front-page__serviceCatchCopy">1日で美容や健康、お金に<br />ついて総合的に体験</h3>
            <p class="front-page__serviceContent">1,000人の女性がもっと自分らしく生きるために必要な美容や健康、食事や子育て、お金の稼ぎ方から増やし方までを1日で学べて体験できる祭典です。</p>
			<div class="m_botton"><a href="https://smartbeauty-expo.com/">詳細はこちら</a></div>
        </li>
    </ul>
  </section>
  <section class="front-page__voice">
      <h1 class="front-page__voiceHeading">受講生の声</h1>
      <p class="front-page__voiceText">累計500名以上の<br class="sp">受講生の喜びの声をご紹介します</p>
      <div class="front-page__voiceSliderWrapper">
        <div class="front-page__voiceBgGradationPrev"></div>
        <div class="front-page__voiceNextBtn"></div>
        <ul class="front-page__voiceslider">
        <?php
            $args = array( 'post_type' => 'voice', 'posts_per_page' => 12 );  // カスタム投稿タイプ Products
            $the_query = new WP_Query($args); if ($the_query->have_posts()):
        ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <li class="front-page__voiceItem">
                <div class="front-page__voiceSpeechBubble">
                    <h2 class="front-page__voiceName"><?php the_field('name'); ?>さん</h2>
                    <h3 class="front-page__voicePosition"><?php the_field('position'); ?></h3>
                    <p class="front-page__voiceContent"><?php the_title(); ?></p>
                </div>
                <?php the_post_thumbnail('thumbnail', array('class' => '"front-page__voiceImage')); ?>
            </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </ul>
        <div class="front-page__voiceBgGradationNext"></div>
        <div class="front-page__voicePrevBtn"></div>

    </div>
    <a href="voice" class="front-page__voiceButton">もっと見る</a>
  </section>
  <section class="front-page__media">
    <h1 class="front-page__mediaHeading">
        <div class="front-page__mediaHeadingInner">
            <span class="front-page__mediaHeadingSpan">日本テレビ「スッキリ」,<br class="sp"> NHK「ニュース シブ5時」,日経ARIAなど</span><br />
            <strong>たくさんのメディアに<br class="sp">ご紹介いただきました！</strong>
        </div>
    </h1>
    <ul class="front-page__mediaList">
        <li class="front-page__mediaItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/top_media01.jpg" alt="日本テレビ「スッキリ」出演" class="front-page__mediaImage">
            <div class="front-page__mediaNameBg">
                <h2 class="front-page__mediaName">日本テレビ「スッキリ」</h2>
            </div>
            <time datetime="2017-08-24">2017年8月24日</time>
        </li>
        <li class="front-page__mediaItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/top_media02.jpg" alt="NHK「ニュース シブ５時」" class="front-page__mediaImage">
            <div class="front-page__mediaNameBg">
                <h2 class="front-page__mediaName">NHK「ニュース シブ５時」</h2>
            </div>
            <time datetime="2017-08-24">2017年10月19日</time>
        </li>
        <li class="front-page__mediaItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/top_media03.jpg" alt="日経ARIA「個人ビジネス成功の方程式」" class="front-page__mediaImage">
            <div class="front-page__mediaNameBg">
                <h2 class="front-page__mediaName">日経ARIA「個人ビジネス成功の方程式」</h2>
            </div>
            <time datetime="2017-08-24">2019年4月17日</time>
        </li>
        <li class="front-page__mediaItem">
            <img src="<?php echo get_template_directory_uri(); ?>/img/top_media04.jpg" alt="著書 玉の輿にのれなかった崖っぷち女が　年収1000万円になった黄金の大逆転ルール" class="front-page__mediaImage">
            <div class="front-page__mediaNameBg">
                <h2 class="front-page__mediaName">著書 玉の輿にのれなかった崖っぷち女が<br />年収1000万円になった黄金の大逆転ルール</h2>
            </div>
            <time datetime="2019-09">2019年9月</time>
        </li>
    </ul>
  </section>
  <section class="front-page__aboutCourse">
      <div class="front-page__aboutCourseInner">
          <h1 class="front-page__aboutCourseHeading">講座について</h1>
          <h2 class="front-page__aboutCourseCatch"><strong class="front-page__aboutCourseStrong -primary"><span>あなたにあった</span><em class="front-page__aboutCourseEmphasis">SNS集客</em></strong>を<br class="sp"><strong class="front-page__aboutCourseStrong">総合的に学べる</strong>環境があります</h2>
          <div class="front-page__aboutCourseSns">
              <img src="<?php echo get_template_directory_uri(); ?>/img/top_sns_list_l.png" alt="FaceBook LINE公式 Instagram" class="front-page__aboutCourseSnsImage"><img src="<?php echo get_template_directory_uri(); ?>/img/top_sns_list_r.png" alt="Youtube Twitter セールスコピーライティング" class="front-page__aboutCourseSnsImage">
          </div>
          <p class="front-page__aboutCourseContent">Smart BeではFacebookを中心としたSNS集客が学べる講座を多数用意しています。どの講座も業界では有名な講師をお呼びしているので、再現性があり結果がでる内容となっています。気軽に学べる講座から本格的にビジネスに活かす講座と幅広く選べるようになっているので、ぜひあなたにピッタリなSNS集客を見つけてみてください。</p>
      </div>
  </section>

  <!-- original -->

<?php
    // コンテンツビルダー
    if (! empty($dp_options['contents_builder'])) :
        foreach ($dp_options['contents_builder'] as $key => $content) :
            $cb_index = 'cb_' . $key;
            if (empty($content['cb_content_select'])) {
                continue;
            }
            if (isset($content['cb_display']) && ! $content['cb_display']) {
                continue;
            }

            // 紹介コンテンツ
            if ($content['cb_content_select'] == 'introduce') :
                $args = array('post_type' => $dp_options['introduce_slug'], 'posts_per_page' => '-1', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'meta_key' => 'show_front_page', 'meta_value' => '1');
                if ($content['cb_order'] == 'random') :
                    $args['orderby'] = 'rand';
                endif;

                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

 <div id="cb_<?php echo esc_attr($key); ?>" class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
  <div class="inner">
<?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
   <div id="introduce_list">
    <div class="introduce_list_row inview-fadein clearfix">
<?php
                    $i = 0;
                    $row = 0;
                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();

                        if ($i > 0 && $i % 3 == 0) :
                            $row++;
?>
    </div>
    <div class="introduce_list_row inview-fadein clearfix">
<?php
                        endif;

                        $col_class = '';
                        if ($row % 2 == 0) :
                            if ($i % 3 == 0) :
                                $col_class = ' show_info';
                            endif;
                        else :
                            if ($i % 3 == 2) :
                                $col_class = ' show_info';
                            endif;
                        endif;
?>
     <div class="article introduce_list_col<?php echo esc_attr($col_class); ?>">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="clearfix">
       <div class="image">
        <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size3');
} else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image3.gif" title="" alt="" /><?php } ?>
       </div>
       <div class="info">
        <?php
          if ($dp_options['show_introduce_categories']) {
              $metas = array();
              foreach (explode('-', $dp_options['show_introduce_categories']) as $cat) {
                  if (!empty($dp_options['use_introduce_category'.$cat])) {
                      $terms = get_the_terms($post->ID, $dp_options['introduce_category'.$cat.'_slug']);
                      if ($terms && !is_wp_error($terms)) {
                          $term = array_shift($terms);
                          $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['introduce_category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                      }
                  }
              }
              if ($metas) {
                  echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
              }
          }
        ?>
        <h3 class="title"><?php if (is_mobile()) {
            echo wp_trim_words(get_the_title(), 25, '...');
        } else {
            trim_title(32);
        } ?></h3>
        <p class="excerpt"><?php new_excerpt(148); ?></p>
        <p class="more"><?php _e('Read more', 'tcd-w'); ?></p>
       </div>
      </a>
     </div>
<?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
?>
    </div>
   </div>
  </div>
 </div>

<?php
                endif;

            //カルーセルスライダー
            elseif ($content['cb_content_select'] == 'carousel') :
                $args = array('post_type' => 'post', 'posts_per_page' => $content['cb_post_num'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC');

                if ($content['cb_post_type'] == 'introduce') :
                    $args['post_type'] = $dp_options['introduce_slug'];
                    // タクソノミーターム
                    if ($content['cb_introduce_term']) :
                        $term = get_term($content['cb_introduce_term']);
                        if ($term && !is_wp_error($term)) :
                            $args['tax_query'][] = array('taxonomy' => $term->taxonomy, 'field' => 'term_id', 'terms' => array($term->term_id), 'operator' => 'IN');
                        endif;
                    endif;
                else :
                    if ($content['cb_list_type'] == 'recommend_post' || $content['cb_list_type'] == 'recommend_post2') :
                        $args['orderby'] = 'rand';
                        $args['meta_key'] = $content['cb_list_type'];
                        $args['meta_value'] = 'on';
                    endif;
                endif;

                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

 <div id="cb_<?php echo esc_attr($key); ?>" class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein" style="background-color:<?php echo esc_attr($content['cb_background_color']); ?>">
  <div class="inner">
<?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
   <div class="carousel">
<?php

                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();
?>
    <div class="article item">
     <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <div class="image">
       <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size2');
} else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif" title="" alt="" /><?php } ?>
       <h3 class="title"><?php trim_title(34); ?></h3>
      </div>
      <p class="excerpt"><?php new_excerpt(90); ?></p>
     </a>
    </div>
<?php
                    endwhile;
                    wp_reset_postdata();
?>
   </div>
  </div>
 </div>

<?php
                endif;

            // カテゴリーリスト
            elseif ($content['cb_content_select'] == 'category_list') :
                if ($content['cb_categories'] && is_array($content['cb_categories'])) :
                    $terms = array();
                    foreach ($content['cb_categories'] as $term_id) :
                        $term = get_term($term_id);
                        if ($term && !is_wp_error($term)) :
                            $terms[] = $term;
                        endif;
                    endforeach;
                    if ($terms) :
?>

 <div id="cb_<?php echo esc_attr($key); ?>" class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
  <div class="inner">
<?php
                        if ($content['cb_headline']) :
                            echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                        endif;
                        if ($content['cb_desc']) :
                            echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                        endif;

                        echo '   <ul class="clearfix">';
                        foreach ($terms as $term) {
                            // カテゴリー画像
                            $image = null;
                            $term_meta = get_option('taxonomy_' . $term->term_id);
                            if (!empty($term_meta['image'])) :
                                $image = wp_get_attachment_image_src($term_meta['image'], 'size3');
                            endif;

                            if (!empty($image[0])) :
                                echo '    <li class="has_image">';
                            echo '<a href="' . get_term_link($term) . '">';
                            echo '<div class="image"><img src="' . esc_attr($image[0]) . '" alt=""></div>'; else :
                                echo '    <li>';
                            echo '<a href="' . get_term_link($term) . '">';
                            endif;

                            echo '<div class="info"><h3>' . esc_html($term->name) . '</h3>';
                            if ($term->description) :
                                echo str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($term->description));
                            endif;
                            echo "</div></a></li>\n";
                        }
                        echo "</ul>\n";
?>
  </div>
 </div>

<!--- ブログ表示 --->
<?php
                    endif;
                endif;

            // 最新ブログ記事一覧
            elseif ($content['cb_content_select'] == 'blog_list') :
                $args = array( 'post_type' => 'post', 'posts_per_page' => $content['cb_post_num'], 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC' );
                if (isset($content['cb_list_type'])) :
                    if ($content['cb_list_type'] == 'recommend_post' || $content['cb_list_type'] == 'recommend_post2') :
                        $args['meta_key'] = $content['cb_list_type'];
                        $args['meta_value'] = 'on';
                    elseif ($content['cb_post_term']) :
                        $term = get_term($content['cb_post_term']);
                        if ($term && !is_wp_error($term)) :
                            $args['tax_query'][] = array( 'taxonomy' => $term->taxonomy, 'field' => 'term_id', 'terms' => array($term->term_id), 'operator' => 'IN' );
                        endif;
                    endif;
                    if ($content['cb_order'] == 'random') :
                        $args['orderby'] = 'rand';
                    elseif ($content['cb_order'] == 'date2') :
                        $args['order'] = 'ASC';
                    endif;
                endif;

                $cb_posts = new WP_Query($args);
                if ($cb_posts->have_posts()) :
?>

 <div id="cb_<?php echo esc_attr($key); ?>" class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?> inview-fadein">
  <div class="inner">
<?php
                    if ($content['cb_headline']) :
                        echo '   <h2 class="cb_headline rich_font">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_headline'])) . "</h2>\n";
                    endif;
                    if ($content['cb_desc']) :
                        echo '   <p class="cb_desc">' . str_replace(array( "\r\n", "\r", "\n" ), '<br>', esc_html($content['cb_desc'])) . "</p>\n";
                    endif;
?>
   <ol id="post_list" class="inview-fadein clearfix">
<?php
                    while ($cb_posts->have_posts()) :
                        $cb_posts->the_post();
?>
    <li class="article">
     <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <div class="image">
       <?php if (has_post_thumbnail()) {
    the_post_thumbnail('size2');
} else { ?><img src="<?php echo get_template_directory_uri(); ?>/img/common/no_image2.gif" title="" alt="" /><?php } ?>
      </div>
      <h3 class="title js-ellipsis"><?php the_title(); ?></h3>
      <?php
        $metas = array();
        if ($dp_options['show_categories']) {
            foreach (explode('-', $dp_options['show_categories']) as $cat) {
                if ($cat == 1) {
                    $terms = get_the_terms($post->ID, 'category');
                    if ($terms && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        $metas[] = '<li class="cat"><span class="cat-category" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                    }
                } elseif (!empty($dp_options['use_category'.$cat])) {
                    $terms = get_the_terms($post->ID, $dp_options['category'.$cat.'_slug']);
                    if ($terms && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        $metas[] = '<li class="cat"><span class="cat-'.esc_attr($dp_options['category'.$cat.'_slug']).'" data-href="'.get_term_link($term).'" title="'.esc_attr($term->name).'">'.esc_html($term->name).'</span></li>';
                    }
                }
            }
        }
        if ($dp_options['show_date']) {
            $metas[] = '<li class="date"><time class="entry-date updated" datetime="'.get_the_modified_time('c').'">'.get_the_time('Y.m.d').'</time></li>';
        }

        if ($metas) {
            echo '<ul class="meta clearfix">'.implode('', $metas).'</ul>';
        }
?>
     </a>
    </li>
<?php
                    endwhile;
                    wp_reset_postdata();
?>
   </ol>
<?php
                    if ($content['cb_show_archive_link'] && $content['cb_archive_link_text'] && get_post_type_archive_link('post') != get_bloginfo('url')) :
?>
   <div class="archive_link">
    <a href="<?php echo get_post_type_archive_link('post'); ?>"><?php echo esc_html($content['cb_archive_link_text']); ?></a>
   </div>
<?php
                    endif;
?>
  </div>
 </div><!--- ブログ表示 --->

<?php
                endif;

            //フリースペース
            elseif ($content['cb_content_select'] == 'wysiwyg') :
                $cb_wysiwyg_editor = apply_filters('the_content', $content['cb_wysiwyg_editor']);
                if ($cb_wysiwyg_editor) :
?>

 <div id="cb_<?php echo esc_attr($key); ?>" class="cb_content cb_content-<?php echo esc_attr($content['cb_content_select']); ?>">
  <div class="inner">
   <div class="post_content clearfix">
    <?php echo $cb_wysiwyg_editor; ?>
   </div>
  </div>
 </div>

<?php
                endif;
            endif;

        endforeach;
    endif;
?>

  <!-- カスタム投稿（ブログ） -->
  <div class="front-page__post">
    <?php
    $args = array(
    'post_type' => 'post',
    'posts_per_page' => 6, /* 表示する数 */
    ); ?>

        <?php $my_query = new WP_Query($args); ?>
        <h3 class="front-page__postHeading">受付中のセミナー</h3>
        <ul class="front-page__postList">
            <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <!-- ▽ ループ開始 ▽ -->
            <li class="front-page__postItem">
                <a href="<?php the_permalink(); ?>">
                <span class="top_blog_index_box_img"><?php echo get_the_post_thumbnail(); ?></span>
                <div class="front-page__postInfo">
                    <h4 class="front-page__postName"><?php the_title(); ?></h4>
                    <ul class="post-categories">
                        <?php
                            foreach ((get_the_category()) as $cat) {
                                echo '<li>' . $cat->cat_name . '</li>';
                            };
                        ?>
                    </ul>
                </div>
                </a>
            </li>
            <!-- △ ループ終了 △ -->
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    </div>

  <!-- カスタム投稿（ブログ） -->
  <div class="front-page__post -column">
  <?php
$args = array(
  'post_type' => 'blog', /* カスタム投稿名が「blog」の場合 */
  'posts_per_page' => 6, /* 表示する数 */
); ?>

<?php $my_query = new WP_Query($args); ?>
<h3 class="front-page__postHeading">コラム</h3>
<ul class="front-page__postList">
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
<!-- ▽ ループ開始 ▽ -->
  <li class="front-page__postItem">
    <a href="<?php the_permalink(); ?>">
      <span class="top_blog_index_box_img"><?php echo get_the_post_thumbnail(); ?></span>
      <div class="front-page__postInfo">
          <h4 class="front-page__postName"><?php the_title(); ?></h4>
          <ul class="post-categories">
              <?php $terms = wp_get_object_terms($post->ID, 'blog');//カスタムタクソノミーのスラッグ
                if ($terms) {
                    foreach ($terms as $term) {
                        echo '<li class="'.$term->slug.'">'.$term->name.'</li>' ;
                    }
                };
                ?>
            </ul>
    </div>
    </a>
  </li>
<!-- △ ループ終了 △ -->
<?php endwhile; ?>
</ul>

<?php wp_reset_postdata(); ?>
</div>
  <!-- カスタム投稿（ブログ） -->

  <!-- original -->

<script>
$( document ).ready(function( $ ) {
  $('#thumb-v').sliderPro({
    width: 933,//横幅
    height: 526,
    orientation: 'vertical',//スライドの方向
    arrows: true,//左右の矢印
    buttons: false,//ナビゲーションボタン
    loop: false,//ループ
    thumbnailsPosition: 'right',//サムネイルの位置
    thumbnailPointer: true,//アクティブなサムネイルにマークを付ける
    thumbnailWidth: 280,//サムネイルの横幅
    thumbnailHeight: 160,//サムネイルの縦幅
    breakpoints: {
      796: {//表示方法を変えるサイズ
        thumbnailsPosition: 'bottom',
        orientation: 'horizontal',//スライドの方向,
        thumbnailWidth: 280,
        thumbnailHeight: 160
      },
      480: {//表示方法を変えるサイズ
        orientation: 'horizontal',
        width: 375,
        height: 375,
        thumbnailWidth: 0,
        thumbnailHeight: 0
      }
    }
  });
});
</script>

<script>
    $(document).ready(function(){
      $('.front-page__voiceslider').bxSlider({
        maxSlides: 6,
        moveSlides: 1,
        slideWidth: 200,
        slideMargin: 0,
        auto: true,
        easing: 'ease-in',
        pause: 3000,
        autoHover: true,
        pager: false,
        nextSelector: ".front-page__voicePrevBtn",
        prevSelector: ".front-page__voiceNextBtn",
        nextText: "",
        prevText: "",
      });
    });
  </script>


<?php get_footer(); ?>
