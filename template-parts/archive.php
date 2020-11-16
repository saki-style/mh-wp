<article class="news-art">
    <a href="<?php the_permalink(); ?>">
    <div class="news-img">
<?php
if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'news' );
} else {
    echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/news/noimg.png" alt="">';
}
?>
    </div>
    <div class="news-body">
        <time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'Y/n/j' ); ?></time>
        <h2 class="news-tit"><?php the_title(); ?></h2>
    </div>
    </a>
</article>