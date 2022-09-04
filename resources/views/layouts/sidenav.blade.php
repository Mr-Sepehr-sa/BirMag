<!-- Sidenav -->
<header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
        <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
            <i class="ui-close sidenav__close-icon"></i>
        </button>
    </div>

    <!-- Nav -->
    <nav class="sidenav__menu-container">
        <ul class="sidenav__menu" role="menubar">

            <?php
            use App\Models\Category;
            $categ = Category::all();
            ?>

            <li>
                <a href="/" class="sidenav__menu-url">صفحه اصلی</a>
            </li>

            <!-- Categories -->
             <?php foreach ($categ as $item){
                echo "<li><a href='/".$item->slug."' class='sidenav__menu-url'>".$item->name."</a></li>";
             }?>

        </ul>
    </nav>

    <div class="socials sidenav__socials">
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
</header> <!-- end sidenav -->