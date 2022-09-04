@extends('layouts.master')

<?php use App\Models\Comment;
$comments = Comment::where('article_id',$article->id)->get();
?>

@section('title' , "| $article->title")

@section('content')

    <br/>

    <div class="main-container container" id="main-container">

        <!-- Content -->
        <div class="row">

            <!-- post content -->
            <div class="col-lg-8 blog__content mb-72">
                <div class="content-box">

                    <!-- standard post -->
                    <article class="entry mb-0">

                        <div class="single-post__entry-header entry__header">
                            <a href="#" class="entry__meta-category entry__meta-category--label entry__meta-category--green">{{$catg}}</a>
                            <h1 class="single-post__entry-title">
                                {{$article->title}}
                            </h1>

                            <div class="entry__meta-holder">
                                <ul class="entry__meta">
                                    <li class="entry__meta-author">
                                        <span>نویسنده:</span>
                                        <a href="#">{{$writer}}</a>
                                    </li>
                                    <li class="entry__meta-date">
                                        {{$article->created_at}}
                                    </li>
                                </ul>

                                <ul class="entry__meta">
                                    <li class="entry__meta-views">
                                        <i class="ui-eye"></i>
                                        <span>{{$article->view}}</span>
                                    </li>
                                    <li class="entry__meta-comments">
                                        <a href="#">
                                            <i class="ui-chat-empty"></i><?php echo $comments->count();?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end entry header -->

                        <div class="entry__img-holder">
                            <img src="/img/articles/{{$article->pic}}" alt="{{$article->pic}}" class="entry__img">
                        </div>

                        <div class="entry__article-wrap">

                            <div class="entry__article">

                                <?= $article->body ?>

                                <!-- tags -->
                                <div class="entry__tags">
                                    <i class="ui-tags"></i>
                                    <span class="entry__tags-label">برچسب ها:</span>
                                    <?php
                                        $article->hashtag = explode( '-', $article->hashtag );
                                        foreach ($article->hashtag as $item){
                                            echo "<a href='/article/$article->slug' rel='tag'>$item</a>";
                                        }
                                    ?>
                                </div> <!-- end tags -->

                            </div> <!-- end entry article -->
                        </div> <!-- end entry article wrap -->

                        <!-- Author -->
                        <h6 class="entry-author__name"> نویسنده : {{$writer}}</h6>
                        <br/>


                    </article> <!-- end standard post -->

                    <!-- Comments -->
                    <div class="entry-comments">
                        <div class="title-wrap title-wrap--line">
                            <h3 class="section-title"><?php echo $comments->count();?> دیدگاه</h3>
                        </div>
                        <ul class="comment-list">

                            <?php
                                foreach ($comments as $comment){
                                    echo "<li>
                                <div class='comment-body'>
                                    <div class='comment-avatar'>
                                        <img alt='avatar' src='/img/default-avatar.png'>
                                    </div>
                                    <div class='comment-text'>
                                        <h6 class='comment-author'>".e($comment->writer)."</h6>
                                        <div class='comment-metadata'>
                                            <a href='#' class='comment-date'>".$comment->created_at."</a>
                                    </div>
                                        <p>".e($comment->body)."</p>
                                    </div>
                                </div>
                            </li>";
                                }
                            ?>

                             <!-- end 3 comment -->

                        </ul>
                    </div> <!-- end comments -->

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Comment Form -->
                    <div id="respond" class="comment-respond">
                        <div class="title-wrap">
                            <h5 class="comment-respond__title section-title">دیدگاه شما</h5>
                        </div>
                        <form id="form" action="/article/comment" class="comment-form" method="post" >
                            @csrf
                            <p class="comment-form-comment">
                                <label for="comment">دیدگاه</label>
                                <textarea id="comment" name="comment" rows="5" required="required"></textarea>
                            </p>

                            <div class="row row-20">
                                <div class="col-lg-4">
                                    <label for="name">نام: *</label>
                                    <input name="name" id="name" type="text" required="required" value="@if(auth()->check()){{{auth()->user()->name}}}@endif">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">ایمیل: *</label>
                                    <input name="email" id="email" type="email" required="required" value="@if(auth()->check()){{{auth()->user()->email}}}@endif">
                                </div>
                                <div class="col-lg-4">
                                    <label for="comment">وبسایت:</label>
                                    <input name="website" id="website" type="text">
                                </div>
                            </div>
                            <input type="text" hidden name="url" value="{{$article->slug}}">
                            <input type="text" hidden name="id" value="{{$article->id}}">

                            <p class="comment-form-submit">
                                <input type="submit" class="btn btn-lg btn-color btn-button" value="ارسال دیدگاه" />
                            </p>

                        </form>
                    </div> <!-- end comment form -->

                </div> <!-- end content box -->
            </div> <!-- end post content -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

                @include('layouts.sidebar1')

            </aside> <!-- end sidebar -->

        </div> <!-- end content -->

    </div> <!-- end main container -->
@endsection