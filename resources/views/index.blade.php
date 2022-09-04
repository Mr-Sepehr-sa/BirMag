<?php
use App\Models\Article;
use App\Models\User;

$article = Article::orderBy('created_at','desc')->paginate(8);
$page = $article->total() / 8;
$page = ceil($page);

?>
@extends('layouts.master')

@section('title' , '')

@section('active_nav','active')

@section('content')


    <div class="main-container container pt-24" id="main-container">

        <!-- Content -->
        <div class="row">

            <!-- Posts -->
            <div class="col-lg-8 blog__content">

                <!-- Latest News -->
                <section class="section tab-post mb-16">
                    <div class="title-wrap title-wrap--line">
                        <h3 class="section-title">آخرین عنوان ها</h3>
                    </div>

                    <!-- tab content -->
                    <div class="tabs__content tabs__content-trigger tab-post__tabs-content">

                        <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                            <div class="row card-row">
                                <?php foreach ($article as $item){
                                    echo "<div class='col-md-6'>
                                    <article class='entry card'>

                                            <div class='entry__img-holder card__img-holder'>
                                            <a href='/article/".$item->slug."'>
                                                <div class='thumb-container thumb-70'>
                                                    <img data-src='"."/img/articles/".$item->pic."' src='/img/empty.png' class='entry__img lazyload' alt='".$item->title."' />
                                                </div>
                                            </a>
                                        </div>";
                                            echo "<div class='entry__body card__body'>
                                            <div class='entry__header'>

                                                <h2 class='entry__title'>
                                                    <a href='/article/".$item->slug."'>".$item->title."</a>
                                                </h2>
                                                <ul class='entry__meta'>
                                                    <li class='entry__meta-author'>
                                                        <span>نویسنده:</span>";
                                                        $wrname = User::select('name')->where('id',$item->writer_id)->get();
                                                        foreach ($wrname as $value){
                                                            echo "<a href='#'>".$value->name."</a>";
                                                        }

                                            echo "</li>
                                                    <li class='entry__meta-date'>
                                            ".$item->created_at."
                                            </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </article>
                                </div>";
                                    }?>

                            </div>
                        </div> <!-- end pane 1 -->

                    </div> <!-- end tab content -->


                    <!-- Pagination -->
                    <nav class="pagination">
                        <?php

                            for($i = 1;$i<=$page;$i++){
                                if($article->currentPage() == $i){
                                    echo "<a href='/?page=$i' class='pagination__page pagination__page--current'>$i</a>";
                                }else{
                                    echo "<a href='/?page=$i' class='pagination__page'>$i</a>";
                                }

                            }
                        ?>

                    </nav>
                </section> <!-- end latest news -->

            </div> <!-- end posts -->

            <!-- Sidebar -->
            <aside class="col-lg-4 sidebar sidebar--right">

                @include('layouts.sidebar1')

                @include('layouts.sidebar2')

            </aside> <!-- end sidebar -->

        </div> <!-- end content -->


        @include('layouts.carouselposts')


    </div> <!-- end main container -->


@endsection