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

<img src="<?php echo get_template_directory_uri(); ?>/img/instructor_recruitment_header.jpg" alt="">

<div class="instructorRecruitment">
    <div class="instructorRecruitment__inner">
        <section>
            <h1 class="instructorRecruitment__heading">ただ今、Smart Beではセミナー講師を募集しています。</h1>
            <p class="instructorRecruitment__paragraph">Smart Beでは年間100回のセミナーを実施（2019年実績）しており、現在は3名の講師の方にセミナーをお願いしています。<br />今後はさらに学びを通して経済的・精神的に自立した女性を創出していくため、より多種多様な講座を立ち上げて行きたいと考えています。</p>
            <p class="instructorRecruitment__paragraph">そのため、Smart Beの使命である「学びを通して、人生を選択できる自由で幸せな女性を創出する」に共感していただき、女性の夢や思いに寄り添いながら、セミナーを通して女性を応援していただける講師の方を募集します。</p>
        </section>
        <section>
            <h1 class="instructorRecruitment__heading">受講生の多くは、成長意欲の高い30～40代の女性です。</h1>
            <p class="instructorRecruitment__paragraph">Smart Beのセミナーに参加される方は、自分の理想の人生を歩むために学びとともに成長を恐れない30～40代の女性がとても多いのが特徴です。</p>
            <p class="instructorRecruitment__paragraph">講師になられた方には、ご自身がこれまで仕事や日常生活の中で培ってきた経験や知識が大いに役に立つチャンスがあります。夢や理想のために学びたいと思っている女性たちに、ぜひ惜しみなくご自身の情報を共有いただければと思います。</p>
        </section>
        <section>
            <h1 class="instructorRecruitment__heading">SNSで広く拡散され認知度が高まります。</h1>
            <p class="instructorRecruitment__paragraph">受講生の多くは、日頃からFacebookやInstagramといったSNSを大いに活用している女性ばかりなので、セミナーの模様も随時SNSにて発信されます。フォロワーが数万人、数十万人いるインフルエンサーの女性が参加することも珍しくないので、講師になると認知度が一気に広まるでしょう。</p>
            <p class="instructorRecruitment__paragraph">なお、セミナー講師のメリットなどさらに詳しい内容は、以下のPDFファイルも併せてご参照ください。</p>
        </section>
        <a href="" class="iconWithButton">
            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_play.svg" alt="" class="iconWithButton__icon">
            <span>講師募集資料(PDF)ダウンロード</span>
        </a>
    </div>
</div>

<?php get_footer(); ?>