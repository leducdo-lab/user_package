@extends('user::layout.welcome')
@section('content')
<div class="banner-top">
	<div class="container">
		<h1>Login</h1>
		<em></em>
		<h2><a href="{{(URL::to('/home'))}}">Home</a><label>/</label>Login</h2>
	</div>
</div>
<!--login-->
<div class="container">
    <div class="login">

        <form action="{{ route('login') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-6 login-do">
                @if(Session::has('flag'))
                    <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('message') }}</div>
                @endif
                @if (count($errors) > 0)
                    @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                            <div class="login-mail">
                    <input type="text" name="email" placeholder="Email" required="">
                    <i  class="glyphicon glyphicon-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" name="password" placeholder="Password" required="">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                <a class="news-letter " href="#">
                        <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
                    </a>
                <label class="hvr-skew-backward">
                    <input type="submit" value="login">
                </label>
            </div>
            <div class="col-md-6 login-right">
                <h3>Completely Free Account</h3>
                <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                <a href="{{(URL::to('/register'))}}" class=" hvr-skew-backward">Register</a>
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
