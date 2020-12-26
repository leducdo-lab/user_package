<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Shopin</title>
        <base href="{{asset('')}}">
        <link href="{{('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="{{('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--theme-style-->
        <link href="{{('css/style4.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!--//theme-style-->
        <script src="{{('js/jquery.min.js')}}"></script>
        <!--- start-rate---->
        <script src="{{('js/jstarbox.js')}}"></script>
        <link rel="stylesheet" href="{{('css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
        <link href="{{('css/form.css')}}" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript">
            jQuery(function() {
                jQuery('.starbox').each(function() {
                    var starbox = jQuery(this);
                    starbox.starbox({
                        average: starbox.attr('data-start-value'),
                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                        ghosting: starbox.hasClass('ghosting'),
                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                        stars: starbox.attr('data-star-count') || 5
                        }).bind('starbox-value-changed', function(event, value) {
                            if(starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' '+val);
                            return val;
                        }
                    })
                });
            });
        </script>
        <!---//End-rate---->

        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 300px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, .4);
                }

            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 50%;
            }

            .close {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            #popup {
                width: 80%;
                height: 100%;
            }
        </style>

    </head>
<body>
<!--header-->
    @include('user::layout.header')
<!--banner-->
    @yield('content')
	<!--//footer-->
	@include('user::layout.footer')
    <!--//footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{('js/simpleCart.min.js')}}"> </script>
    <!-- slide -->
    <script src="{{('js/bootstrap.min.js')}}"></script>
    <!--light-box-files -->
    <script src="{{('js/jquery.chocolat.js')}}"></script>
    <link rel="stylesheet" href="{{('css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('a.picture').Chocolat();
        });
    </script>
</body>
</html>
