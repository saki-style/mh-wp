<?php
/* セットアップ
------------------------------------------------- */
function my_setup() {
  add_theme_support( 'post-thumbnails' ); // アイキャッチ
  add_theme_support( 'automatic-feed-links' ); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support( 'title-tag' ); // タイトルタグ自動生成
  add_filter( 'document_title_separator', function(){ return '|'; } ); // タイトルの区切り文字を「|」にする (必要な場合)
  add_theme_support( 'html5', array( //HTML5でマークアップ
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));
}
add_action( 'after_setup_theme', 'my_setup' );


/* css・jsの読み込み
------------------------------------------------- */
function my_script_init() {
  // css
  wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'drawer', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css', array(), '3.2.2', 'screen and (max-width:767px)' );
  wp_enqueue_style( 'my', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all' );
  // js
  wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'iscroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js', array( 'jquery' ), '5.2.0', true );
  wp_enqueue_script( 'drawer-js', 'https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js', array( 'iscroll-js' ), '3.2.2', true );
  wp_enqueue_script('my-js', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );


/* メニューの登録
------------------------------------------------- */
function my_menu_init() {
  register_nav_menu( 'gnav', 'グローバルナビ');
}
add_action( 'init', 'my_menu_init' );
/* メニューアイテムに説明分（ルビ）を表示 */
function prefix_nav_description( $item_output, $item, $depth, $args ) {
  if ( !empty( $item->description ) ) {
    $item_output = str_replace( '">' . $args->link_before . $item->title, '">' . $args->link_before .  '<ruby>' . $item->description . '<rt>' . $item->title . '</rt>' . '</ruby>' , $item_output );
  }
  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


/* ページタイトルの表示分け
------------------------------------------------- */
function get_main_title() {
  // 固定ページ
if ( is_page() ):
  return get_field( 'english_title' );
// カテゴリー・投稿ページ
elseif ( is_category() || is_singular( 'post' )):
  $category_obj = get_the_category();
  $category_slug = $category_obj[0] -> category_nicename ;//スラッグ名を取得
  return strtoupper( $category_slug );
// エラーページ
elseif ( is_404() ):
  return 'ERROR';
// お問い合わせ完了画面
elseif ( is_page( 'thanks' ) ):
  $page_id = get_page_by_path( 'inquiry' );
  $page_id = $page_id->ID;
  return get_field( 'english_title', $page_id );
endif;
// スケジュールページ
// elseif ( is_post_type_archive( 'schedule' ) ):
//   $post_obj = get_post_type_object( 'schedule' );
//   return $post_obj -> name;
}


/* 子ページを取得（第二引数を指定→そのページの子ぺーじを取得、デフォルトのnull(指定なし）で閲覧している記事の子ぺーじを取得
------------------------------------------------- */
function get_child_pages( $number = -1, $specified_id = null ) {
  if ( isset( $specified_id ) ):
      $parent_id = $specified_id;
  else:
    $parent_id = get_the_ID();
  endif;
  //メインクエリ（データベースから取得）
  $args = array(
    'posts_per_page' => $number,//取得したい記事数→全件
    'post_type' => 'page',//固定ページ
    'orderby' => 'menu_order',//設定した並び順
    'order' => 'ASC',//orderbyを元にした並び順→昇順
    'post_parent' => $parent_id,//表示したい子ぺーじが紐づく親ページの指定
  );
  //サブクエリ（テンプレート内から取得）
  $child_pages = new WP_Query( $args );
  return $child_pages;
}


/* 特定の記事を抽出（投稿タイプ、表示したいタームが属するタクソノミー（news)のスラッグ、ターム(news記事）のスラッグ、記事数）
------------------------------------------------- */
function get_art_posts( $post_type, $taxonomy = null, $term = null, $number = -1 ) {
//　カスタム投稿タイプ用（タームが未入力の場合、全てのタームを取得する）
  if ( ! $term ):
    $terms_obj = get_terms( 'area' );
    $term = wp_list_pluck( $terms_obj, 'slug' );
  endif;
  $args = array(
    'post_type' => $post_type,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'slug',
        'terms' => $term,
      ),
    ),
    'posts_per_page' => $number,
  );
  $art_posts = new WP_Query( $args );
  return $art_posts;
}


/* お問い合わせ完了画面のページ遷移
------------------------------------------------- */
add_action( 'wp_footer', 'add_thanks_page' );
function add_thanks_page() {
echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = 'http://localhost:8888/dev/thanks/';
}, false );
</script>
EOD;
}


/* 抜粋文の設定
------------------------------------------------- */
// 抜粋機能を固定ページで使用可能にする
add_post_type_support( 'page', 'excerpt' );
// 抜粋文の最後につく文字列の変更
function cms_excerpt_more() {
  return '...';
}
add_filter( 'excerpt_more', 'cms_excerpt_more' );
// 標準の110文字から変更
function cms_excerpt_length() {
  return 10;
}
add_filter( 'excerpt_length', 'cms_excerpt_length');
/* 文字数を指定する場合 */
function get_flexible_excerpt( $number ) {
  $value = get_the_excerpt();
  $value = wp_trim_words( $value, $number, '...');
  return $value;
}
// get_the_excerpt()で取得する文字列に改行タグを挿入
function apply_excerpt_br( $value ) {
  return nl2br( $value );
}
add_filter( 'get_the_excerpt', 'apply_excerpt_br');


/* ボタンショートコード （$atts=引数、$contet=[]ここに入力した文字[]）
------------------------------------------------- */
// オリジナル
function btn_shortcode( $atts, $content = '' ) {
  extract( shortcode_atts( array(
     'class' => 'story',
     'link' => 'story',
  ), $atts, 'btn') );
  return '<p class="' .  $atts['class'] . '-btn"><a href="' . esc_url( home_url( $atts['link'] ) ) . '">' . $content . '</a></p>';
}
add_shortcode('btn', 'btn_shortcode');
// 予約サイトへ
function rsv_btn_shortcode() {
  return '<p class="rsv-btn"><a href="' . esc_url( home_url() ) . '">チケット予約サイトへ</a></p>';
}
add_shortcode('rsv-btn', 'rsv_btn_shortcode');
// 問い合わせページへ
function inq_btn_shortcode() {
  return '<p class="inq-btn"><a href="' . esc_url( home_url( "inquiry" ) ) . '">お問い合わせはこちら</a></p>';
}
add_shortcode('inq-btn', 'inq_btn_shortcode');


/* 背景画像ショートコード
------------------------------------------------- */
// カスタムフィールドより指定
function bg_shortcode( $atts ) {
  $atts = shortcode_atts( array(
    'id' => '',
  ), $atts, 'bg-image' );
  return 'style="background-image:url(' . esc_url( wp_get_attachment_url( $atts['id'] ) ) . ')"';
}
add_shortcode( 'bg-image', 'bg_shortcode');


/* 画像設定
------------------------------------------------- */
add_image_size( 'news', 510, 285.6, true );//サイズの名前、横幅、縦幅、切り抜くかどうか（falseはリサイズ）
add_image_size( 'art', 810, 578, true );//サイズの名前、横幅、縦幅、切り抜くかどうか（falseはリサイズ）
add_image_size( 'cast', 220, 220, true );//サイズの名前、横幅、縦幅、切り抜くかどうか（falseはリサイズ）


?>