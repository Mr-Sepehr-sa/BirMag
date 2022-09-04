<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                @if(auth()->check())
                    <p><?= auth()->user()->name ?></p>
                @else
                    <a href="{{route('login')}}" style="font-size: small;color: red;"><b>لطفا وارد شوید</b></a>
                @endif
                <p></p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستجو">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>
            <li>
                <a href="/admin/panel">
                    <i class="fa fa-dashboard"></i> <span>داشبرد</span>
                </a>
            </li>
            <li>
                <a href="/admin/newArticle">
                    <i class="fa fa-pencil"></i> <span>افزودن مقاله جدید</span>
                </a>
            </li>
            <li>
                <a href="/admin/viewArticles">
                    <i class="fa fa-eye"></i> <span>مشاهده مقالات</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-block">خروج</button>
                </form>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>