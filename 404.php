<?php get_header(); ?>

<section <?php body_class(); ?>>
    <div class="inner">
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <div class="bg-box _page">
        <p>お探しのページが見つかりませんでした。</p>
        <p>お手数ですが、入力されたURLが正しいかご確認ください。</p>
<?php echo do_shortcode( '[btn class="link"]TOP[/btn]' ); ?>
        </div>
    </div>
</section>
        
<?php get_template_part( 'template-parts/archive_5' ); ?>

<?php get_footer(); ?>