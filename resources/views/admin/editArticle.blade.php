@extends('admin.adminMaster.admaster')

@section('title' , 'ویرایش مقاله')

<?php
use App\Models\Category;
$categ = Category::all();
?>

@section('content')
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">ویرایش مقاله
            </h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- /.box-header -->
        <div class="box box-primary col-md-6">
            <div class="box-body pad">
                <form action="/admin/edit/{{$article->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 50%">
                                <div class="form-group">
                                    <label for="title">عنوان مقاله</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="عنوان مقاله" value="{{$article->title}}" required="required">
                                </div>
                            </td>
                            <td style="width: 50%">
                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select name="category" class="form-control">
                                        <option selected>{{$catg}}</option>
                                        <?php foreach ($categ as $item){
                                            echo "<option>".$item->name."</option>";
                                        }?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="slug">آدرس یکتا</label>
                                                <input type="text" name="slug" class="form-control" id="slug" placeholder="آدرس یکتا" value="{{$article->slug}}" required="required">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="hashtag">برچسب ها&nbsp<small>(لطفا بین برچسب ها از علامت - استفاده کنید)</small></label>
                                                <input type="text" name="hashtag" class="form-control" id="hashtag" placeholder="برچسب ها" value="{{$article->hashtag}}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="wrapper">
                                                <label for="fileUpload">تصویر اصلی</label>
                                                <input id="fileUpload" name="image" type="file" multiple />
                                                <br />
                                                <img class="thumb-image" style="width: 40%;float: left;" src="/img/articles/{{$article->pic}}" alt="{{$article->pic}}" >
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="display: flex;justify-content: center;text-align: center;">
                                <br/>
                                <label for="image-holder">پیش نمایش</label>
                                <div id="image-holder"></div>
                            </td>
                        </tr>
                    </table>
                    <textarea id="editor1" name="editor1" rows="10" cols="80" required="required"><?= $article->body ?></textarea>
                    <button class="btn btn-block btn-primary btn-lg"  type="submit">تایید</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <!-- CK Editor -->
    <script src="../../bower_components/ckeditor/ckeditor.js"></script>
    <script src="../../bower_components/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#mytextarea',
            plugins : 'advlist autolink link lists preview table code pagebreak',
            menubar: false,
            language: 'fa',
            height: 300,
            relative_urls: false,
            toolbar: 'undo redo | removeformat preview code | fontsizeselect bullist numlist | alignleft aligncenter alignright alignjustify | bold italic | pagebreak table link',
        });
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    /////
    <script>
        $("#fileUpload").on('change', function () {

            //Get count of selected files
            var countFiles = $(this)[0].files.length;

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();

            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {

                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img  />", {
                                "src": e.target.result,
                                "class": "thumb-image"
                            }).appendTo(image_holder);
                        }

                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }

                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }
        });
    </script>

@endsection