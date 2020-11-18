<!---- linear nav ---->
<nav class="linear">
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
if( $prev_post ):?>
    <div class="linear-link _prev">
        <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
        <p class="linear-btn">&lt;</p>
        <div class="linear-body">
            <time datetime="<?php echo get_the_time( 'c', $prev_post->ID ); ?>"><?php echo get_the_time( 'Y.n.j', $prev_post->ID ); ?></time>
            <p><?php echo get_the_title( $prev_post->ID ); ?></p>
        </div>
        </a>
    </div>
<?php endif;
if( $next_post ):?>
    <div class="linear-link _next">
        <a href="<?php echo get_permalink( $next_post->ID ); ?>">
            <div class="linear-body">
                <time datetime="<?php echo get_the_time( 'c', $next_post->ID ); ?>"><?php echo get_the_time( 'Y.n.j', $next_post->ID ); ?></time>
                <p><?php echo get_the_title( $next_post->ID ); ?></p>
            </div>
        <p class="linear-btn">&gt;</p>
        </a>
    </div>
<?php endif; ?>
</nav><!---- /linear nav ---->
