@extends('layouts.app')
@section('title')
<title>Admin | Edit Role</title>
@endsection
@section('head')
@include('include.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2-bootstrap.min.css" integrity="sha512-Y44HZ7AfvVnvFx9SzgZtBVT0+HlCqdyraYJOV6Q1Ft6q7af5OkwPYcpHNiJAYcQfHjlb+yH7+nD9+DnfpXpDhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.css" integrity="sha512-I3Xmcu7DAdHgmDqMusus1zzJJs6fZRiiGkmbTpL77JVI2wH7/zH/FF1T2FhlNqkOW9FgixkwZft4ttRx3Rj1AA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('left_part')
@include('include.left_part')
@endsection
@section('content')
<!-- Start right Content here -->
<!-- ============================================================== -->
<div id="wrapper">
	<!-- Sidebar -->
	@if(auth::user()->user_type=='A')
	<ul class="sidebar navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="{{route('home')}}">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span>
			</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="{{route('role.page')}}">
				<i class="fas fa-fw fa-chart-area"></i>
				<span>Role manage</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('user.page')}}">
					<i class="fas fa-fw fa-table"></i>
					<span>User manage</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
						<span> &nbsp; Logout</span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form></li>
				</ul>
				@else
				<ul class="sidebar navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.html">
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Picture manage</span>
						</a>
					</li>
					
					
					<li class="nav-item">
						<a class="nav-link" href="tables.html">
							<i class="fas fa-fw fa-table"></i>
							<span>Tables</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
								<span> &nbsp; Logout</span>
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form></li>
						</ul>
						@endif
						{{-- end side bar --}}
						
						@include('include.errors')
						<div class="container-fluid">
							<div class="body-main">
								<div class="top-row">
									<div class="task-mg-row">
										<h2 class="my-1">Edit Role</h2>
										
										<div class="right-sec">
											<ul>
											
												<li>
													<a href="{{route('role.page')}}" class="link">Back</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
								<form action="{{route('role.upd')}}" method="post" id="frm">
									@csrf
									<input type="hidden" name="id" value="{{@$role->id}}">
									<div class="top-row faq-sec">
										<div class="form-group my-3">
											<label class="form-label">Role name:</label>
											<input class="form-control" placeholder="Enter Role" type="text" name="role" style="width: 30%" value="{{@$role->role_name}}">
											
											
											
										</div>
										<div class="form-group my-3">
											<label class="form-label">Permission:</label>
											<br>
											<select class="form-control rm06" name="per_id"  style="width: 30%" >
												{{--  --}}
												@foreach(@$per as $key=> $val)
												
												<option @if($val->id==$role->permision_id) selected @endif value="{{$val->id}}" >{{$val->name}}</option>
												
												@endforeach
											</select>
											
										</div>
										<div class="flx-row my-3">
											<button type="submit" class="btn btn-primary mb-2">Submit</button>
										</div>
									</div>
								</form>
								
								
								
								
								
							</div>
						</div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End Right content here -->
				{{-- @section('footer')
				@include('include.footer')
				@endsection --}}
				@endsection
				{{-- end content --}}
				@section('script')
				@include('include.script')
				{{-- for select2 --}}
				<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.js" integrity="sha512-cvmdmfILScvBOUbgWG7UbDsR1cw8zuaVlafXQ3Xu6LbgE0Ru6n57nWbKSJbQcRmkQodGdDoAaZOzgP4CK6d4yA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
				<script>
					$(document).ready(function(){
				$('#slct1').select2({
						placeholder: 'Select an user'/*+$id*/,
					});
					});
				</script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
				<script>
				$(document).ready(function(){
					
				
				$('#frm').validate({
					ignore: [],
				rules:{
				role:{
				required:true,
				minlength:5,
				},
				'per_id[]':{
				required:true,
				},
				},
				messages:{
				/*   old_password:{
				required:" Old password is mandatory",
				min:"Enter minimum 6 characters"
				},
				newPassword:{
				required:" New password is mandatory",
				min:"Enter minimum 6 characters"
				},
				confirm:{
				required:" Confirm password is mandatory",
				min:"Enter minimum 6 characters",
				equalTo :"New password and confirm password are not matching"
				},*/
				}
				});
				});
				</script>
				@endsection