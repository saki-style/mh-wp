<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class( ['drawer', 'drawer--right'] ); ?>>

    <!---- header ---->
    <header class="header">

<?php get_template_part( 'template-parts/gnav' ); ?>

<?php if( is_front_page() ): ?>
        <!------ TOPページ ------>
        <!---- mv (TOP) ---->
        <div class="mv _top wow fadeIn">
            <div class="inner">
                <p class="mv-tit"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_tit.png" alt="完全版マハーバーラタ"></p>
                <div class="mv-content">
                    <p class="mv-sched"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_sched.png" alt="なかのZERO大ホール"></p>
                    <p class="mv-txt"><?php echo get_the_excerpt(); ?></p>
                </div>
<?php echo do_shortcode( '[rsv-btn]' ); ?>
            </div>
        </div><!---- / mv (TOP)  ---->

    </header><!---- /header ---->

    <!---- main ---->
    <main class="main"><!------ /TOPページ ------>

<?php
elseif( is_page( 'story' )):
    $story_page = get_page_by_path( 'story' );
    $post = $story_page;
setup_postdata( $post );
?>
        <!------ STORYページ ------>
        <!---- mv (STORY) ---->
        <div class="mv _story" <?php echo do_shortcode( '[bg-image id="' . get_field( 'image_main' ) . '"]' ); ?>>
            <div class="inner">
                <div class="mv-content">
                    <p class="mv-tit"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_tit.png" alt="完全版マハーバーラタ"></p>
                    <p class="mv-sched"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_sched.png" alt="なかのZERO大ホール"></p>
                </div>
<?php echo do_shortcode( '[rsv-btn]' ); ?>
            </div>

            <!---- breadcrumb ---->
            <p class="breadcrumb"><?php bcn_display(); ?></p><!---- /breadcrumb ---->

            <!---- STORY ---->
            <div class="story-upper">
                <h1 class="sec-tit wow fadeInUp"><?php echo get_main_title(); ?></h1>
                <div class="inner">
                    <h2><?php echo get_the_excerpt(); ?></h2>
                    <p class="story-txt"><?php echo nl2br( get_field( 'content_top' ) ); ?></p>
                </div>
            </div>
        </div><!---- /mv (STORY)  ---->

    </header><!---- /header ---->

    <!---- main ---->
    <main class="main"><!------ /STORYページ ------>

<?php
wp_reset_postdata();
else:
?>
        <!------ その他固定ページ ------>
        <!---- mv (child page)  ---->
        <div class="mv _child">
            <div class="inner">
                <div class="mv-content">
                    <p class="mv-tit"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_tit.png" alt="完全版マハーバーラタ"></p>
                    <p class="mv-sched"><img src="<?php echo get_template_directory_uri() ?>/img/module/mv_sched.png" alt="なかのZERO大ホール"></p>
                </div>
<?php echo do_shortcode( '[rsv-btn]' ); ?>
            </div>
        </div><!---- /mv (child page) ---->

        <!---- breadcrumb ---->
        <p class="breadcrumb"><?php bcn_display(); ?></p><!---- /breadcrumb ---->

    </header><!---- /header ---->

    <!---- main ---->
    <main class="main"><!------ /その他固定ページ ------>

<?php endif; ?>
