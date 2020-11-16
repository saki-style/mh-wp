<?php if (paginate_links() ) : ?>
<!---- paging nav ---->
<nav class="paging">
    <ul class="paging-list">
<?php
echo paginate_links( array(
    'end_size' => 1, //ページ番号のリストの両端（最初と最後）にいくつの数字を表示するか
    'mid_size' => 1, //現在のページの両側にいくつの数字を表示するか。
    'prev_next' => true, //リストの中に「前へ」「次へ」のリンクを含むかどうか。
    'prev_text' => '<',
    'next_text' => '>'
));
?>                
    </ul>
</nav><!---- /paging nav ---->
<?php endif; ?>