<?php

use App\Http\Controllers\ArticleViewController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/categories/{name}/{id}', function ($id,$name) {
    return view('categories',[
        'id' => $id,
        'name' => $name
    ]);
});

Route::post('/article/comment', function () {

    $validator = Validator::make(request()->all(),[
        'name' => 'required',
        'comment' => 'required',
        'email' => 'required'
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    Comment::create([
        'writer' => request('name'),
        'body' => request('comment'),
        'email' => request('email'),
        'article_id' => request('id'),
        'status' => 1

    ]);

    $url = "/article/".request('url');

    return redirect($url);
});

Route::get('/article/{slug}', function ($slug) {

    $article = Article::where('slug',$slug)->get()->first();

    if(is_null($article)){
        abort(404);
    }

    $writer = User::select('name')->where('id',$article->writer_id)->get()->first()->name;

    $category = Category::select('name')->where('id',$article->cat_id)->get()->first()->name;

    return view('article',[
        'article' => $article,
        'writer' => $writer,
        'catg' => $category
    ]);

});

Route::get('/login', function () {
    return view('login');
});



Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('/panel',function (){
        return view('admin.adminPanel');
    });

    Route::get('/newArticle',function (){
        return view('admin.newArticle');
    });

    Route::post('/newArticle',function (){

        $validator = Validator::make(request()->all(),[
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'editor1' => 'required',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $category = Category::select('id')->where('name',request('category'))->get()->first()->id;

        $pic = '';

        if (isset($_FILES['image'])){

            if (file_exists($_FILES['image']['tmp_name'])){
                $path = 'img/articles/';
                $path .= $_FILES['image']['name'];
                $pic = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$path);
            }
        }


        Article::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'writer_id' => request('writer'),
            'cat_id' => $category,
            'hashtag' => request('hashtag'),
            'body' => request('editor1'),
            'status' => 1,
            'pic' => $pic,
            'view' => 0
        ]);

        return redirect('/admin/newArticle');

    });

    Route::post('/editArticle/{id}',function ($id){


        $article = Article::where('id',$id)->get()->first();

        if(is_null($article)){
            abort(404);
        }elseif (auth()->user()->id != $article->writer_id){
            abort(404);
        }


        $wrname = User::select('name')->where('id',$article->writer_id)->get()->first()->name;
        $cag = Category::select('name')->where('id',$article->cat_id)->get()->first()->name;


        return view('admin.editArticle',[
            'article' => $article,
            'writer' => $wrname,
            'catg' => $cag
        ]);

    });

    Route::post('/edit/{id}',function ($id){

        $validator = Validator::make(request()->all(),[
            'title' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'editor1' => 'required'
        ]);

        if($validator->fails()){
            abort(404);
        }

        $article = Article::findOrFail($id);

        $category = Category::select('id')->where('name',request('category'))->get()->first()->id;

        $pic = null;

        if (isset($_FILES['image'])){

            if (file_exists($_FILES['image']['tmp_name'])){
                $path = 'img/articles/';
                $path .= $_FILES['image']['name'];
                $pic = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],$path);
            }
        }

        if ($pic != null){
            $article->update([
                'pic' => $pic
            ]);
        }


        $article->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'writer_id' => 1,
            'cat_id' => $category,
            'hashtag' => request('hashtag'),
            'body' => request('editor1')
        ]);

        return redirect('/admin/viewArticles');


    });

    Route::get('/viewArticles',function (){

        return view('admin.viewArticles');
    });

});




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
