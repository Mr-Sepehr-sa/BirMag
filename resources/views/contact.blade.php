@extends('layouts.master')

@section('title' , '| تماس با ما')

@section('content')

    <br/>

    <div class="main-container container" id="main-container">
        <!-- post content -->
        <div class="blog__content mb-72">
            <h1 class="page-title">تماس با ما</h1>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h4>با ما تماس بگیرید</h4>
                    <p>
                        لطفا در صورت داشتن هرگونه سوال یا پیشنهاد آن را از طریق فرم زیر به دست ما برسانید
                    </p>
                    <ul class="contact-items">
                        <li class="contact-item">
                            <address>خراسان جنوبی - بیرجند</address>
                        </li>
                        <li class="contact-item"><a href="#">056-32222222</a></li>
                        <li class="contact-item"><a href="mailto:topkala@gmail.com">SabzekarSepehr@gmail.com</a></li>
                    </ul>

                    <!-- Contact Form -->
                    <form id="contact-form" class="contact-form mt-30 mb-30" method="post" action="#">
                        <div class="contact-name">
                            <label for="name">نام <abbr title="required" class="required">*</abbr></label>
                            <input name="name" id="name" type="text">
                        </div>
                        <div class="contact-email">
                            <label for="email">ایمیل <abbr title="required" class="required">*</abbr></label>
                            <input name="email" id="email" type="email">
                        </div>
                        <div class="contact-subject">
                            <label for="email">موضوع</label>
                            <input name="subject" id="subject" type="text">
                        </div>
                        <div class="contact-message">
                            <label for="message">پیام <abbr title="required" class="required">*</abbr></label>
                            <textarea id="message" name="message" rows="7" required="required"></textarea>
                        </div>

                        <input type="submit" class="btn btn-lg btn-color btn-button" value="فرستادن" id="submit-message">
                        <div id="msg" class="message"></div>
                    </form>

                </div>
            </div>
            <br/>
            <br/>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d704.6689591399368!2d59.290706334125!3d32.845533396770264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f1a432d0e91a6e3%3A0x20b7d03efb50d1de!2zMzLCsDUwJzQzLjciTiA1OcKwMTcnMjUuMyJF!5e0!3m2!1sfa!2sae!4v1634907874550!5m2!1sfa!2sae" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div> <!-- end post content -->
    </div> <!-- end main container -->

@endsection
