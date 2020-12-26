@extends('user::layout.welcome')
@section('content')
    <div class="banner-top">
        <div class="container">
            <h1>Change Password</h1>
            <em></em>
            <h2><a href="{{(URL::to('/home'))}}">Home</a><label>/</label>Change Password</h2>
        </div>
    </div>
    <!--login-->
    <div class="container">
        <div class="login">

            <form action="{{ route('change_password') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" >
                <div class="col-md-6 login-do">
                    @if(Session::has('flag'))   {{-- khi dang nhap k thanh cong--}}
                        <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('message') }}</div>
                    @endif
                    @if (!empty($errors))   {{--khi nhap sai cac truong du lieu--}}
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                        <div class="login-mail">
                            <input type="password" name="password_fu" placeholder="Password cũ" required="">
                            <i class="glyphicon glyphicon-lock"></i>
                        </div>
                    <div class="login-mail">
                        <input type="password" name="password_new" placeholder="Password mới" required="">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                        <div class="login-mail">
                            <input type="password" name="re_password_new" placeholder="Confirm Password" required="">
                            <i class="glyphicon glyphicon-lock"></i>
                        </div>
                    <label class="hvr-skew-backward">
                        <input type="submit" value="Lưu">
                    </label>
                </div>
                <div class="col-md-6 login-right">
                    <h3>Completely Free Account</h3>
                    <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                        libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                    <a href="{{(URL::to('/home'))}}" class=" hvr-skew-backward">Back Home</a>
                </div>

                <div class="clearfix"> </div>
            </form>
        </div>
    </div>

    <!--//login-->

    <!--brand-->
    <div class="container">
        <div class="brand">
            <div class="col-md-3 brand-grid">
                <img src="images/ic.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="images/ic1.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="images/ic2.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-3 brand-grid">
                <img src="images/ic3.png" class="img-responsive" alt="">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--//brand-->
@endsection
