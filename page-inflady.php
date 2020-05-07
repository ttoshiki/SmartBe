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

<div id="inflady">
    <div class="inflady__titleWrapper">
        <h1 class="inflady__title">
            Instagram・YouTube・Twitter、<br class="sp">それぞれの使い方を学びながら、<br />
            自ら<strong class="inflady__titleStrong">インフルエンサーとなり<br class="tab sp">大きな影響力を持つ人材</strong><br />
            として成長できるコミュニティ
        </h1>
    </div>
    <section class="inflady__sec">
        <p class="inflady__paragraph">
        世の中にSNSが広く浸透し、コミュニケーションの手段としてなくてはならないものと言っても過言ではないでしょう。<br />
        その中でも抑えておくべきSNSがあります。
        </p>
        <div class="inflady__mustSns">
            <h2 class="inflady__heading">抑えておくべき<strong class="inflady__headingStrong">3</strong>つの<strong class="inflady__headingStrong">SNS</strong></h2>
            <div class="inflady__mustSnsFigure">
                <figure>
                    <img src="<?php echo content_url() ?>/themes/gensen_tcd050/img/icon_instagram.png" alt="Instagram" class="inflady__snsLogo">
                    <figcaption class="inflady__snsCaption">Instagram</figcaption>
                </figure>
                <figure class="inflady__snsFigure -youtube">
                    <img src="<?php echo content_url() ?>/themes/gensen_tcd050/img/icon_youtube.svg" alt="Youtube" class="inflady__snsLogo -youtube">
                    <figcaption class="inflady__snsCaption">Youtube</figcaption>
                </figure>
                <figure>
                    <img src="<?php echo content_url() ?>/themes/gensen_tcd050/img/icon_twitter.svg"" alt="Twitter" class="inflady__snsLogo">
                    <figcaption class="inflady__snsCaption">Twitter</figcaption>
                </figure>
            </div>
        </div>
        <p class="inflady__paragraph">SmartBeはインフLadyというコミュニティを発足し、3つのSNSの楽しみ方・正しい活用法を学べる環境をご用意しました。</p>
        <p class="inflady__paragraph"><strong class="inflady__strong">有名インフルエンサー</strong>や各SNSを知り尽くした<strong class="inflady__strong">スペシャリスト</strong>から直接指導を受けられるイベントに参加できたり、参加者同士でフォローしあって<strong class="inflady__strong">人脈を広げたり</strong>、SNSの醍醐味を存分に味わうことができます。</p>
        <figure class="inflady__chart">
            <?php echo file_get_contents(get_template_directory() . '/img/inflady_chart.svg');?>
        </figure>
        <p class="inflady__paragraph">出会いの場として楽しんだり、しっかり学んで自らインフルエンサーとなり高い影響力を掴んだり、ビジネスもプライベートも共に充実させられるサービスです。</p>
        <button class="c-button -primary inflady__button"><div class="inflady__buttonIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_play.svg');?></div>無料でコミュニティーに入る</button>
    </section>
</div><!-- id voice --->

</div><!-- END #main_col -->

<?php get_footer(); ?>