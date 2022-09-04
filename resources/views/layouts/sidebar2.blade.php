<!-- Sidebar 2 -->
<?php
use App\Models\Category;
$categ = Category::all();
?>

    <!-- Widget Categories -->
<aside class="widget widget_categories">
        <h4 class="widget-title">دسته بندی نوشته ها</h4>
        <ul>
            <?php foreach ($categ as $item){
                echo "<li><a href='/categories/".$item->id."/".$item->name."'>".$item->name."</a></li>";
            }?>
        </ul>
    </aside> <!-- end widget categories -->
