<?php

use App\Models\Article;use App\Models\Category;use App\Models\User;

$article = Article::where('writer_id', auth()->user()->id)->orderBy('created_at','desc')->get();

?>
@extends('admin.adminMaster.admaster')

@section('title' , 'مقالات')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">مشاهده مقالات</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>دسته بندی</th>
                                <th>نویسنده</th>
                                <th>تاریخ انتشار</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <?php
                                foreach ($article as $item){
                                    $wrname = User::select('name')->where('id',$item->writer_id)->get();
                                    foreach ($wrname as $value){
                                        $writer = $value->name;
                                    }
                                    $cag = Category::select('name')->where('id',$item->cat_id)->get();
                                    foreach ($cag as $value){
                                        $category = $value->name;
                                    }
                                    echo "
                                <td>".$item->title."</td>
                                <td>".$category."</td>
                                <td>".$writer."</td>
                                <td>".$item->created_at."</td>
                                <td><form method='post' action='/admin/editArticle/".$item->id."'>"; ?>
                                @csrf
                            <?php echo"
                                <button class='btn btn-block btn-danger btn-sm' type='submit'>ویرایش</button></form></td></tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection

@section('script')

    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

@endsection