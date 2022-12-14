<?php
use App\Models\Article;
$categ = Article::orderBy('created_at','desc')->limit(5)->get();
?>
<div class="container">
    <div class="trending-now">
                <span class="trending-now__label">
                    <i class="ui-flash"></i>
                    خبرهای داغ</span>
        <div class="newsticker">
            <ul class="newsticker__list">
                <?php foreach ($categ as $item){
                    echo "<li class='newsticker__item'><a href='/article/".$item->slug."' class='newsticker__item-url'>".$item->title."</a></li>";
                }?>
            </ul>
        </div>
        <div class="newsticker-buttons">
            <button class="newsticker-button newsticker-button--next" id="newsticker-button--next" aria-label="previous article"><i class="ui-arrow-left"></i></button>
            <button class="newsticker-button newsticker-button--prev" id="newsticker-button--prev" aria-label="next article"><i class="ui-arrow-right"></i></button>
        </div>
    </div>
</div>