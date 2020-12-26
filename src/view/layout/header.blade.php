<div class="header">
    <div class="container">
            <div class="head">
                <div class=" logo">
                    <a href="{{(URL::to('/home'))}}"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="header-top">
            <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">
                        <ul >
                            @if (empty(Cookie::get('name')))
                                <li><a href="{{(URL::to('/login'))}}">Login</a></li>
                                <li><a href="{{(URL::to('/register'))}}">Register</a></li>
                            @endif
                        </ul>
                    </div>

                <div class="col-sm-5 header-social">
                        <ul >
                            <li><a href="#"><i></i></a></li>
                            <li><a href="#"><i class="ic1"></i></a></li>
                            <li><a href="#"><i class="ic2"></i></a></li>
                            <li><a href="#"><i class="ic3"></i></a></li>
                            <li><a href="#"><i class="ic4"></i></a></li>
                        </ul>

                </div>
                    <div class="clearfix"> </div>
            </div>
            </div>

            <div class="container">

                <div class="head-top">

             <div class="col-sm-8 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">

     <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header nav_2">
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

       </div>
       <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <ul class="nav navbar-nav nav_1">
                <li><a class="color" href="{{(URL::to('/home'))}}">Home</a></li>
                <li><a class="color" href="{{ route('product') }}">All product</a></li>

                <li class="dropdown mega-dropdown active">
                    <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Women<span class="caret"></span></a>
                    <div class="dropdown-menu ">
                        <div class="menu-top">
                            <div class="col1">
                                <div class="h_nav">

                                        <ul>
                                            @if (!empty($types))
                                            @for ($i=0 ; $i<=5 ; $i++ )
                                            <li><a href="{{ route('type','type='.$types[$i]->id) }}">{{$types[$i]->name}}</a></li>
                                                @if(count($types) < $i + 2) @break; @endif
                                            @endfor
                                            @endif
                                        </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                            @if (!empty($types))
                                            @for ($i=6 ; $i<=10 ; $i++ )
                                            @if(count($types) < $i + 2) @break; @endif
                                            <li><a href="{{ route('type','type='.$types[$i]->id) }}">{{$types[$i]->name}}</a></li>

                                            @endfor
                                            @endif
                                        </ul>
                                </div>
                            </div>
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                            @if (!empty($types))
                                            @for ($i=11 ; $i<=15 ; $i++ )
                                            @if(count($types) < $i + 2) @break; @endif
                                            <li><a href="{{ route('type','type='.$types[$i]->id) }}">{{$types[$i]->name}}</a></li>

                                            @endfor
                                            @endif
                                        </ul>
                                </div>
                            </div>

                            <div class="col1 col5">
                            <img src="images/me.png" class="img-responsive" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </li>
                <!-- Thông tin người dùng. -->
                @if(!empty(Cookie::get('name')))
                    <li class="dropdown mega-dropdown active">
                        <a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Cookie::get('name') }}<span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu">
                                <div class="h_nav">
                                        <ul style="list-style-type: none;">
                                            <li><a href="{{(URL::to('/info'))}}">Thông tin</a></li>
                                            <li><a href="{{(URL::to('/change_password'))}}">Đổi mật khẩu</a></li>
                                            <li><a href="{{(URL::to('/home/order'))}}">Đơn hàng</a></li>
                                            <li><a href="{{(URL::to('/logout'))}}">Đăng xuất</a></li>
                                        </ul>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                    </li>
                @endif
                <!-- Thông tin người dùng. -->
            </ul>
        </div><!-- /.navbar-collapse -->

    </nav>
                </div>
                <div class="col-sm-2 search-right">
                    <ul class="heart">
                    <li>
                    <a href="wishlist.html" >
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    </a></li>
                    <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
                        </ul>
                        <div class="cart box_1">
                            <a href="{{(route('cart'))}}">
                            <h3>  <img src="{{(url('images/cart.png'))}}" alt=""/></h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty"></a></p>

                        </div>
                        <div class="clearfix"> </div>

                            <!----->

                            <!---pop-up-box---->
                <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
                <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <form action="{{(route('search'))}}" method="post" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="">
                                <input type="text" name="name" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                            </form>
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
            <script>
                $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });
                });
            </script>
                            <!----->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
