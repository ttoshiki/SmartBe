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

<img src="<?php echo get_template_directory_uri(); ?>/img/recruit_header.jpg" alt="" class="pc tab">
<img src="<?php echo get_template_directory_uri(); ?>/img/recruit_header-sp.jpg" alt="" class="sp">

<div id="recruit">
    <div class="recruit__inner">
        <table class="recruit__table">
            <tr>
                <th>こんなことやります</th>
                <td>
                    バックオフィス業務を担うメンバーを募集します！重要な管理業務を担っていただくので、コツコツと目の前にある仕事を頑張っていただける方にお任せしたいです！<br />
                    ※中途社員の募集です。
                </td>
            </tr>
            <tr>
                <th>お任せしたい<br />仕事内容</th>
                <td>イベントの企画運営・WEBサイトの更新<br />その他、都度発生するバックオフィス業務を全般的にお任せします。</td>
            </tr>
            <tr>
                <th>以下のような方を<br />求めています！</th>
                <td>
                    ・Word／Excel／PowerPoint、それぞれ初級から中級程度のスキルをお持ちの方<br />（Excelは簡単な関数が組める程度、PowerPointは資料作成ができる程度でOK！）<br /><br class="sp">
                    ・FacebookやLINEなど、SNSを日常的に使っていらっしゃる方<br /><br class="sp">
                    ・WEBサイト関連の知識を、ある程度お持ちの方<br /><br class="sp">
                    ※上記に当てはまらない方も、積極的に学ぶ姿勢をお持ちであれば歓迎します！<br /><br />
                    経営者と近い距離で会社の成長を楽しみたい方、女性の社会進出を応援したい
                </td>
            </tr>
            <tr>
                <th>その他</th>
                <td>
                    <strong>・セミナー参加など、各種補助あり！</strong><br/>
                    スキルアップに向けた研修やセミナーに参加する際は、積極的に補助をします。第二創業期の当社に参画し、アカデミーをはじめとした運営を支えてくれませんか？<br/><br />
                    <strong>・副業もOKです！</strong><br/>
                    しっかりと業務を遂行していただければ、副業もOKにしています。週末など好きなことを仕事にし、ワークライフバランスも整えられる会社です！
                </td>
            </tr>
        </table>
        <a href="" class="iconWithButton">
            <img src="<?php echo get_template_directory_uri(); ?>/img/icon_play.svg" alt="" class="iconWithButton__icon">
            <span class="recruit__buttonSpan">お問い合わせはこちら</span>
        </a>
    </div>
</div>

<?php get_footer(); ?>