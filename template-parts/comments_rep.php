<div class="cmt-box" <?php echo do_shortcode( '[bg-image id="' . get_field( 'image_rep' ) . '"]' ); ?>>
    <p class="cmt-name">
        <small><?php the_field( 'small_rep' ); ?></small>
        <?php the_field( 'name_rep' ); ?>
    </p>
    <p class="cmt-txt"><?php echo nl2br( get_field( 'msg_rep' ) ); ?></p>
<?php
if( is_front_page() ):
    echo do_shortcode( '[btn class="cmt" link="comments"]もっと見る[/btn]' );
endif;
?>
</div>