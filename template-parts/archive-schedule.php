<?php
$sched = SCF::get('sched');
foreach ($sched as $fields ) {
?>
<li class="sched-item">
    <time datetime="2020-07-04 17:00"><?php echo $fields[ 'data' ]; ?> <?php echo $fields[ 'time' ]; ?>開演</time>
    <p class="sched-txt"><?php echo $fields[ 'place' ]; ?></p>
    <a href=""><?php echo $fields[ 'link' ]; ?></a>
</li>
<?php
}
?>