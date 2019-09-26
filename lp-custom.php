<?php
/*
Template Name:LP CUSTOM
*/
?>
<?php get_header(); ?>
<main class="main">
<section class="top-hero" style="background-image: linear-gradient( rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)), url(<?php echo get_field('hero_img')['url']; ?>);">
  <h1 class="top-hero__ttl"><?php the_field('hero_main'); ?></h1>
  <p class="top-hero__subttl"><?php the_field('hero_sub'); ?></p>
  <a href="#"><?php the_field('hero_button'); ?></a>
</section>
<section class="top-concept">
  <h2 class="sec-ttl">CONCEPTS</h2>
  <p>すべてが揃う。そんな場所を目指しています。</p>
  <div class="top-concept__item">
    <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con1.png" alt="簡単設定">
    <h3>簡単設定</h3>
    <p>面倒な受付手続きはスキップ。オンラインで簡単スピーディに設定できます。</p>
  </div>
  <div class="top-concept__item">
    <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con2.png" alt="全天候型">
    <h3>全天候型</h3>
    <p>天気に左右されない全天候型の施設を完備。明日の天気の心配はありません。</p>
  </div>
  <div class="top-concept__item">
    <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con3.png" alt="飲食フリー">
    <h3>飲食フリー</h3>
    <p>あちこちに飲食スペースが設けてあります。持ち込みフードもOKです。</p>
  </div>
  <div class="top-concept__item">
    <img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/con4.png" alt="いつでも睡眠">
    <h3>いつでも睡眠</h3>
    <p>滞在型だからこそできるのが、いつでもベッドルームに戻って寝ることです。</p>
  </div>
</section>
<section class="top-point1">
  <p>集中的に仕事を進めることが出来る。<br>そんな環境が整っています。</p>
</section>
<section class="top-news">
  <h2 class="sec-ttl">LATEST NEWS</h2>
  <p>最新情報です。</p>

  <?php $myposts = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => '6'
  )); ?>

  <?php if($myposts):
    foreach($myposts as $post):
    setup_postdata($post); ?>

  <article <?php post_class(); ?>>
  <a href="<?php the_permalink(); ?>">
  <?php if(has_post_thumbnail()): ?>
  <figure>
  <?php the_post_thumbnail(); ?>
  </figure>
  <?php else: ?>
  <figure>
  <img src="<?php echo get_template_directory_uri(); ?>/default.jpg" alt="">
  </figure>
  <?php endif; ?>
  <h3><?php the_title(); ?></h3>
  </a>
  </article>
    <?php endforeach;
    wp_reset_postdata();
    endif; ?>
</section>
<section class="top-point2" style="background-color:<?php the_field('point2_bkcolor'); ?>">
  <figure><?php echo wp_get_attachment_image(get_field('point2_img')['ID'],'full') ?></figure>
  <div class="top-point2__txt">
    <p><?php the_field('point2_big'); ?></p>
    <p><?php the_field('point2_small'); ?></p>
  </div>
</section>
<section class="top-voice">
  <h2 class="sec-ttl">TESTIMONIALS</h2>
  <p>沢山の方にご利用いただいています</p>
  <div class="top-voice__test1">
    <figure><img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/test1.jpg" alt=""></figure>
    <div>
    <p>その日に合わせてワークスペースを選ぶことが出来てとても便利でした。</p></div>
    <p><strong>TANAKA HANAKO</strong></p>
    <p>Designer</p>
  </div>
  <div class="top-voice__test2">
    <figure><img src="<?php echo get_template_directory_uri(); ?>/lp-custom/img/test2.jpg" alt=""></figure>
    <div>
    <p>わからないことがあっても、テクニカルアドバイザーに質問できるので安心です。</p></div>
    <p><strong>SUZUKI TARO</strong></p>
    <p>Front-end Engineer</p>
  </div>
</section>
<section class="top-contact">
  <p>日常のその先へ</p>
  <p>いつでも、お越しをお待ちしております。</p>
  <a href="#">ワークスペースを申し込む</a>
</section>
</main>
<?php get_footer(); ?>
