<?php
use App\Models\Article;
$articles = Article::orderBy('view','desc')->limit(6)->get();
?>
<!-- Carousel posts -->
<section class="section mb-0">
    <div class="title-wrap title-wrap--line">
        <h3 class="section-title">پربازدیدترین مقالات</h3>
    </div>

    <!-- Slider -->
    <div id="owl-posts" class="owl-carousel owl-theme owl-carousel--arrows-outside">
        @foreach($articles as $article)
            <article class="entry thumb thumb--size-1">
                <div class="entry__img-holder thumb__img-holder" style="background-image: url('/img/articles/{{$article->pic}}');">
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder">
                        <h2 class="thumb-entry-title">
                            <a href="/article/{{$article->slug}}">{{$article->title}}</a>
                        </h2>
                    </div>
                    <a href="/article/{{$article->slug}}" class="thumb-url"></a>
                </div>
            </article>
        @endforeach
    </div> <!-- end slider -->

</section> <!-- end carousel posts -->