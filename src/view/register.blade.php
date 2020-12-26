@extends('user::layout.welcome')
@section('content')
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Register</h1>
		<em></em>
		<h2><a href="{{(URL::to('/home'))}}">Home</a><label>/</label>Register</h2>
	</div>
</div>
<!--login-->
<div class="container">
    <div class="login">
        <form action="{{(route('register'))}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-md-6 login-do">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br/>
                        @endforeach
                    </div>
                @endif
                <div class="login-mail">
                        <input type="text" placeholder="Name" required="" name="full_name">
                        <i  class="glyphicon glyphicon-user"></i>
                    </div>
                    <div class="login-mail">
                        <input type="text" placeholder="Phone Number" required="" name="phone">
                        <i  class="glyphicon glyphicon-phone"></i>
                    </div>
                    <div class="login-mail">
                        <input type="text" placeholder="Email" required="" name="email">
                        <i  class="glyphicon glyphicon-envelope"></i>
                    </div>
                    <div class="login-mail">
                        <input type="password" placeholder="Password" required="" name="password">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                    <div class="login-mail">
                        <input type="text" placeholder="Address" required="" name="address">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </div>

                    <label class="hvr-skew-backward">
                        <input type="submit" value="Submit">
                    </label>

                </div>
                <div class="col-md-6 login-right">
                        <h3>Completely Free Account</h3>

                        <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                        libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                    <a href="{{(URL::to('/login'))}}" class="hvr-skew-backward">Login</a>

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
