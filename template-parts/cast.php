<li class="cast-item">
    <div class="cast-img">
<?php
$image_id = $fields[ 'image' ];
echo wp_get_attachment_image( $image_id, 'cast' );
?>
    </div>
    <div class="cast-info">
        <div class="cast-name">
            <p><?php echo $fields[ 'position' ]; ?></p>
            <h2><?php echo $fields[ 'name' ]; ?></h2>
            <small><?php echo $fields[ 'small' ]; ?></small>
        </div>
        <p class="cast-txt"><?php echo nl2br( $fields[ 'info' ] ); ?></p>
    </div>
</li>