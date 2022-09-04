<?php
use App\Models\Article;
$articles = Article::orderBy('view','desc')->limit(2)->get();
?>
<!-- Footer -->
<footer class="footer footer--light">
    <div class="container">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <aside class="widget widget-logo">
                        <a href="/">
                            <img src="/img/logo_default_white.png" srcset="/img/logo.png 1x, img/logo_default_white@2x.png 2x" class="logo__img" alt="">
                        </a>
                        <p class="copyright">
                            استفاده از مطالب BirMag برای مقاصد غیرتجاری با ذکر نام BirMag و لینک به منبع بلامانع است.
                        </p>
                        <div class="socials socials--large socials--rounded mb-24">
                            <a href="#" class="social social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                            <a href="#" class="social social-twitter" aria-label="twitter"><i class="ui-twitter"></i></a>
                            <a href="#" class="social social-google-plus" aria-label="google+"><i class="ui-google"></i></a>
                            <a href="#" class="social social-youtube" aria-label="youtube"><i class="ui-youtube"></i></a>
                            <a href="#" class="social social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                        </div>
                    </aside>
                </div>

                <div class="col-lg-2 col-md-6">
                    <aside class="widget widget_nav_menu">
                        <h4 class="widget-title">هشتگ های داغ</h4>
                        <ul>
                            <li><a href="#">#تکنولوژی</a></li>
                            <li><a href="#">#موبایل</a></li>
                            <li><a href="#">#کتاب</a></li>
                            <li><a href="#">#هنر</a></li>
                            <li><a href="#">#زیبایی</a></li>
                            <li><a href="#">#دیجیتال</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-4 col-md-6">
                    <aside class="widget widget-popular-posts">
                        <h4 class="widget-title">محبوب ترین مقالات</h4>
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
                    </aside>
                </div>

                <div class="col-lg-3 col-md-6">
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
                    </aside>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
    <i class="copyright left">Copyright 2021&copy; Develped by <a target="_blank" href="https://github.com/Mr-Sepehr-sa">Sepehr.Sabzekar </a></i>
</footer> <!-- end footer -->