<!---- NEWS（最新5件）---->
<section class="news">
    <div class="inner">
<?php $term_obj = get_term_by( 'slug', 'news', 'category' ); ?>
        <h1 class="sec-tit wow fadeInUp">
<?php
if( is_front_page() ):
    echo strtoupper($term_obj->slug);
else:
    echo 'LATEST ' . strtoupper($term_obj->slug);
endif;
?>
        </h1>
        <div class="news-wrap _top wow fadeIn">
<?php
$news_posts = get_art_posts( 'post', 'category', 'news', 5);
if ( $news_posts->have_posts() ) :
    while ( $news_posts->have_posts() ) : $news_posts->the_post();
        get_template_part( 'template-parts/archive' );
    endwhile;
    wp_reset_postdata();
endif;
?>
        </div>
<?php echo do_shortcode( '[btn class="news" link="archive/category/news"]ニュース一覧へ[/btn]' ); ?>
    </div>
</section><!---- /NEWS（最新5件） ---->