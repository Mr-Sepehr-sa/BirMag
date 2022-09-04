<?php
use App\Models\Article;
$articles = Article::orderBy('view','desc')->limit(4)->get();
?>
<!-- Widget Popular Posts -->
<aside class="widget widget-popular-posts">
    <h4 class="widget-title">پر بازدید ترین مقالات</h4>
    <ul class="post-list-small">
        @foreach($articles as $article)
            @php
                $writer = App\Models\User::select('name')->where('id',$article->writer_id)->get()->first()->name;
            @endphp
            <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                    <div class="post-list-small__img-holder">
                        <div class="thumb-container thumb-100">
                            <a href="/article/{{$article->slug}}">
                                <img data-src="/img/articles/{{$article->pic}}" src="/img/empty.png" alt="{{$article->pic}}" class="post-list-small__img--rounded lazyload">
                            </a>
                        </div>
                    </div>
                    <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                            <a href="/article/{{$article->slug}}">{{$article->title}}</a>
                        </h3>
                        <ul class="entry__meta">
                            <li class="entry__meta-author">
                                <span>نویسنده:</span>
                                <a href="#">{{$writer}}</a>
                            </li>
                            <li class="entry__meta-date">
                                {{$article->created_at}}
                            </li>
                        </ul>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>
</aside> <!-- end widget popular posts -->

<!-- Widget Newsletter -->
<aside class="widget widget_mc4wp_form_widget">
    <h4 class="widget-title">خبرنامه</h4>
    <p class="newsletter__text">
        <i class="ui-email newsletter__icon"></i>
        برای اطلاع از آخرین خبرها مشترک شوید
    </p>
    <form class="mc4wp-form" method="post">
        <div class="mc4wp-form-fields">
            <div class="form-group">
                <input type="email" name="EMAIL" placeholder="ایمیل" required="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-lg btn-color" value="عضویت">
            </div>
        </div>
    </form>
</aside> <!-- end widget newsletter -->

<!-- Widget Ad 300 -->
<aside class="widget widget_media_image">
    <a href="#">
        <img src="/img/content/mag-1.jpg" alt="">
    </a>
</aside> <!-- end widget ad 300 -->