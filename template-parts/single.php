<div class="art-wrap">
    <div class="art-img">
<?php
if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'art' );
} else {
    echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/news/noimg.png" alt="">';
}
?>
    </div>
    <div class="art-head">
        <time datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'Y.n.j' ); ?></time>
        <h1 class="art-tit"><?php the_title(); ?></h1>
    </div>
    <div class="art-body">
<?php the_content(); ?>
<?php
wp_link_pages( array(
    'before' => '<p class="art-btn">',
    'after' => '</p>',
    'link_before' => '',
    'link_after' => '',
    'next_or_number' => 'next',
    'separator' => '',
));
?>
    </div>
</div>

<?php get_template_part( 'template-parts/liner' ); ?>