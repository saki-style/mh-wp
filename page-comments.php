<?php get_header(); ?>

<!---- COMMENTS ---->
<section class="cmt">
    <div class="inner">
        <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
        <p class="cmt-lead"><?php echo get_the_excerpt(); ?></p>
<?php
$cmt_rep = SCF::get( 'cmt_rep' );
foreach ($cmt_rep as $fields ) {
    include 'template-parts/comments_rep.php';
}
?>
        <div class="cmt-wrap">
<?php
$cmt = SCF::get( 'cmt' );
foreach ($cmt as $fields ) {
    include 'template-parts/comments.php';
}
?>
        </div>
    </div>
</section><!---- /COMMENTS ---->

<?php get_footer(); ?>
