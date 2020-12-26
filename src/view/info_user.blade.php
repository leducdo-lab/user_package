@extends('user::layout.welcome')
@section('content')
<div class="banner-top">
	<div class="container">
		<h1>Information</h1>
		<em></em>
		<h2><a href="{{(URL::to('/home'))}}">Home</a><label>/</label>Information</h2>
	</div>
</div>
<!--login-->
<div class="container">
    <div>
        <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Họ tên</th>
            <th>{{$user[0]->full_name}}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{$user[0]->email}}</th>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <th>{{$user[0]->phone}}</th>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <th>{{$address[0]->address_name}}</th>
        </tr>
        </thead>
    </table>
    </div>
</div>

<!--//login-->

			{{-- <!--brand-->
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
            <!--//brand--> --}}
@endsection
