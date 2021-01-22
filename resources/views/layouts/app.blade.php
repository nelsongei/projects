<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('public/resources/settings/fav-icon.PNG')}}" type="image/png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/mainlrs2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/w3v3.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/popper.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <title>{{config('app_name','Zalego | Project Management Tool')}}</title>
    <style type="text/css">
        .alert-danger{
            background-color: rgb(220, 53, 69);
            color: #fff;
            font-size: 10px;
        }

        .alert-success{
            background-color:#339966;
            color: #fff;
            font-size: 10px;
        }

        .modal-content {
            -webkit-box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;

            background-color: #fff;
            border-color: transparent;

        }

        .modal-dialog {

            margin-top: 140px!important;


        }

        .modal-body {

            padding: 2rem;
            background-color: #eef2f4;
        }

        .modal-backdrop {
            background-color: #000;
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.show {
            opacity: 0.06;
        }

    </style>
</head>
<body style="background-color: #999999;">

<div class="limiter">
    <div class="container-login100">
        <div class="login100-more">
            <h1 class="ml12 p-l-16 p-t-30"><strong>Zalego Project Management Tool</strong></h1><hr>
            <br><br>
            <h2 class="p-l-16 text-center featuresText">At a glance we offer</h2>

            <!-- carousel code -->
            <div id="carouselExampleIndicators" class="carousel slide">

                <div class="carousel-inner">

                    <!-- first slide -->
                    <div class="carousel-item active">
                        <div class="carousel-caption d-md-block">

                            <img data-animation="animated bounceInLeft" src="{{asset('public/assets/images/shots/14.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInRight">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> Project Management Tool
                            </h3>
                        </div>
                    </div>
                    <!-- second slide -->
                    <div class="carousel-item skyblue">
                        <div class="carousel-caption d-md-block">
                            <img data-animation="animated bounceInLeft" src="{{asset('public/assets/images/shots/5.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInRight">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> Testing/Assessment Management
                            </h3>

                        </div>
                    </div>
                    <!-- third slide -->
                    <div class="carousel-item skyblue">
                        <div class="carousel-caption d-md-block">
                            <img data-animation="animated bounceInRight" src="{{asset('public/assets/images/shots/15.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInLeft">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> Reporting & Tracking
                            </h3>

                        </div>
                    </div>
                    <!-- fifth slide -->
                    <div class="carousel-item skyblue">
                        <div class="carousel-caption d-md-block">
                            <img data-animation="animated bounceInRight" src="{{asset('public/assets/images/11.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInUp">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> User Management
                            </h3>

                        </div>
                    </div>

                    <!-- sixth slide -->
                    <div class="carousel-item skyblue">
                        <div class="carousel-caption d-md-block">
                            <img data-animation="animated bounceInUp" src="{{asset('public/assets/images/shots/2.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInLeft">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> Account Management
                            </h3>

                        </div>
                    </div>

                    <!-- seventh slide -->
                    <div class="carousel-item skyblue">
                        <div class="carousel-caption d-md-block">
                            <img data-animation="animated flipInY" src="{{asset('public/assets/images/shots/17.JPG')}}" class="d-block w-100" alt="...">
                            <h3 data-animation="animated bounceInUp">
                                <img src="{{asset('public/assets/images/shots/16.gif')}}" width="15px" height="15px" class="shadow-lg" style="margin-top: -10px;" alt="..."> Email/Chats/Calls
                            </h3>

                        </div>
                    </div>

                </div>

            </div>

            <!--Partners-->
            <div class="partners">
                <h3 class="partnersText">Working closely with <br><span id="cNo">0</span> +<br> companies.<br><br>


                @yield('content')


                <!--include the loaders-->
                @include('uiassets.loaders')
                <!--end loaders-->

            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <!--===============================================================================================-->
        <script type="text/javascript">
            function loader(id){
                var item=id;
                switch(item){
                    case 'facebook':
                        $('#facebookLoginModal').modal('show');
                        break;

                    case 'twitter':
                        $('#twitterLoginModal').modal('show');
                        break;

                    case 'google':
                        $('#googleLoginModal').modal('show');
                        break;

                    case 'email':
                        $('#emailLoginModal').modal('show');
                        break;

                    case 'reset':
                        $('#resetPasswordModal').modal('show');
                        break;
                }
            }

            setInterval(Incrementer,40);
            var x=0;
            function Incrementer(){
                x=x+1;
                if(x<=123){
                    document.getElementById('cNo').innerHTML=x;
                }
            }
            // Wrap every letter in a span
            var textWrapper = document.querySelector('.ml12');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

            anime.timeline({loop: false})
                .add({
                    targets: '.ml12 .letter',
                    translateX: [40,0],
                    translateZ: 0,
                    opacity: [0,1],
                    easing: "easeOutExpo",
                    duration: 1200,
                    delay: (el, i) => 500 + 30 * i
                });

            /* Demo Scripts for Bootstrap Carousel and Animate.css article
            * on SitePoint by Maria Antonietta Perna
            */
            (function($) {
                //Function to animate slider captions
                function doAnimations(elems) {
                    //Cache the animationend event in a variable
                    var animEndEv = "webkitAnimationEnd animationend";
                    elems.each(function() {
                        var $this = $(this),
                            $animationType = $this.data("animation");
                        $this.addClass($animationType).one(animEndEv, function() {
                            $this.removeClass($animationType);
                        });
                    });
                }

                //Variables on page load
                var $myCarousel = $("#carouselExampleIndicators"),
                    $firstAnimatingElems = $myCarousel
                        .find(".carousel-item:first")
                        .find("[data-animation ^= 'animated']");

                //Initialize carousel
                $myCarousel.carousel();

                //Animate captions in first slide on page load
                doAnimations($firstAnimatingElems);

                //Other slides to be animated on carousel slide event
                $myCarousel.on("slide.bs.carousel", function(e) {
                    var $animatingElems = $(e.relatedTarget).find(
                        "[data-animation ^= 'animated']"
                    );
                    doAnimations($animatingElems);
                });
            })(jQuery);
        </script>
        <script src="{{asset('public/assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/vendor/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/vendor/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('public/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/vendor/countdowntime/countdowntime.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{asset('public/assets/js/main.js')}}"></script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            /**
             var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
             (function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e410772298c395d1ce7144d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();**/
        </script>
        <!--End of Tawk.to Script-->
</body>
</html>
