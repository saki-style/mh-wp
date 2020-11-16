<?php get_header(); ?>

<?php
$story = SCF::get( 'story' );
foreach ($story as $fields ) {
    include 'template-parts/story.php';
}
?>
<!---- /STORY ---->

<?php get_footer(); ?>