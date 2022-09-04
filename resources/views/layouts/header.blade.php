<!-- Top Bar -->
<div class="top-bar d-none d-lg-block">
    <div class="container">
        <div class="row">

            <!-- Top menu -->
            <div class="col-lg-6">
                <ul class="top-menu">
                    <li><a href="/aboutus">درباره ما</a></li>
                    <li><a href="/contact">تماس با ما</a></li>
                    @if(auth()->check())
                        <li><a href="/admin/panel">پنل مدیریت</a></li>
                        <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger" style="color: red">خروج</button>
                        </form>
                        </li>
                    @else
                     <li><a href="{{route('login')}}">ورود</a></li>

                    @endif
                </ul>
            </div>

            <!-- Socials -->
            <div class="col-lg-6">
                <div class="socials nav__socials socials--nobase socials--white justify-content-start">
                    <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
                        <i class="ui-facebook"></i>
                    </a>
                    <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
                        <i class="ui-twitter"></i>
                    </a>
                    <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
                        <i class="ui-google"></i>
                    </a>
                    <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
                        <i class="ui-youtube"></i>
                    </a>
                    <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
                        <i class="ui-instagram"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div> <!-- end top bar -->

<!-- Navigation -->
<header class="nav">

    <div class="nav__holder nav--sticky">
        <div class="container relative">
            <div class="flex-parent">

                <!-- Side Menu Button -->
                <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                            <span class="nav-icon-toggle__box">
                                <span class="nav-icon-toggle__inner"></span>
                            </span>
                </button>

                <!-- Logo -->
                <a href="/" class="logo">
                    <img class="logo__img" src="/img/logo.png" alt="logo">
                </a>

            <?php
            use App\Models\Category;
            $categ = Category::all();
            ?>

                <!-- Nav-wrap -->
                <nav class="flex-child nav__wrap d-none d-lg-block">
                    <ul class="nav__menu">

                        <li class="@yield('active_nav')">
                            <a href="/">صفحه اصلی</a>
                        </li>

                        <?php foreach ($categ as $item){
                            echo "<li><a href='/categories/".$item->id."/".$item->name."'>".$item->name."</a></li>";
                        }?>


                    </ul> <!-- end menu -->
                </nav> <!-- end nav-wrap -->

                <!-- Nav Right -->
                <div class="nav__right">

                    <!-- Search -->
                    <div class="nav__right-item nav__search">
                        <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                            <i class="ui-search nav__search-trigger-icon"></i>
                        </a>
                        <div class="nav__search-box" id="nav__search-box">
                            <form class="nav__search-form">
                                <input type="text" placeholder="جستجو مقالات" class="nav__search-input">
                                <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                                    <i class="ui-search nav__search-icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div> <!-- end nav right -->

            </div> <!-- end flex-parent -->
        </div> <!-- end container -->

    </div>
</header> <!-- end navigation -->