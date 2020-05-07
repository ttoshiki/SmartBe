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

<main class="complete">
    <h1 class="complete__title">
        <?php echo file_get_contents(get_template_directory() . '/img/icon_complete.svg'); ?>
        <span class="complete__titleSpan">メルマガ登録完了</span>
    </h1>
    <img src="<?php echo get_template_directory_uri(); ?>/img/cracker.png" alt="" class="complete__eyeCatch">
    <p class="complete__text">ご登録いただきましたメールアドレスに<br />メールをお送りいたしましたので、ご確認ください。</p>
    <small class="complete__small">もし届いてない場合は以下をご参照の上、<br class="sp">受信設定の変更を行ってください。</small>
    <p class="complete__settingParagraph"><a href="" class="complete__settingLink">- 迷惑フォルダに入れず<br class="sp">受信箱に届かせるメール設定方法</a></p>
    <img src="<?php echo get_template_directory_uri(); ?>/img/decorated_line.png" alt="" class="complete__line">
    <section class="complete__lineInfo">
        <h1 class="complete__lineInfoHeading">LINE公式でも<br class="sp">タイムリーな情報<br class="sp">配信中！</h1>
        <h2 class="complete__necessaryHeading">女性が美しく、<br class="sp">凛と輝くために必要なもの</h2>
        <ul class="complete__necessaryList">
            <li class="complete__necessaryItem">
                <p class="complete__necessaryParagraph">時間</p>
                <div class="complete__necessaryIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_clock.svg'); ?></div>
            </li>
            <li class="complete__necessaryItem">
                <p class="complete__necessaryParagraph">お金</p>
                <div class="complete__necessaryIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_money.svg'); ?></div>
            </li>
            <li class="complete__necessaryItem">
                <p class="complete__necessaryParagraph">美</p>
                <div class="complete__necessaryIcon"><?php echo file_get_contents(get_template_directory() . '/img/icon_beauty.svg'); ?></div>
            </li>
        </ul>
        <p class="complete__lineInfoParagraph">LINE公式では<br class="sp">これらを手に入れるための</p>
        <ul class="complete__lineInfoList">
            <li class="complete__lineInfoItem">ビジネスマインド</li>
            <li class="complete__lineInfoItem">集客ノウハウ</li>
            <li class="complete__lineInfoItem">お茶会の作り方</li>
            <li class="complete__lineInfoItem">美容</li>
            <li class="complete__lineInfoItem">ファッション</li>
        </ul>
        <p class="complete__lineInfoParagraph">さらにFacebook集客最新情報や<br />イベント情報、女子会・お茶会などの様子をお届けしています！</p>
        <div class="complete__cta">
            <h2 class="complete__ctaHeading">＼ LINE公式ご登録はこちら！ ／</h2>
            <div class="footer__lineGuidanceImages">
                <div class="">
                    <div class="footer__lineGuidanceIds">
                        <span class="footer__lineGuidanceLabel">LINE ID</span>
                        <span class="footer__lineGuidanceId">@hiromi888</span>
                    </div>
                    <div class="footer__lineGuidanceQRcode">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer_line_qr.png" alt="LINE QRコード" class="footer__lineGuidanceImage">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer_line_qr_speech_bubble.svg" alt="QRコードを読み取って友達追加！" class="footer__lineGuidanceImage">
                    </div>
                    <a href="" class="footer__lineGuidanceButton sp">友達登録する</a>
                </div>
            </div>
        </div>
    </section>
</main>

</div><!-- END #main_col -->

<?php get_footer(); ?>