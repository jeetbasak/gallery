@extends('layouts.app')
@section('title')
<title>User | Add Gallery</title>
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
						<a class="nav-link" href="{{route('home')}}">
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Home</span>
						</a>
					</li>
					
					
					<li class="nav-item">
						<a class="nav-link" href="{{route('img.view')}}">
							<i class="fas fa-fw fa-table"></i>
							<span>Gallery manage</span></a>
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
										<h2 class="my-1">Add Image</h2>
										
										<div class="right-sec">
											<ul>
											
												<li>
													<a href="{{route('img.view')}}" class="link">Back</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
								<form action="{{route('img.ins')}}" method="post" id="frm" enctype="multipart/form-data">
									@csrf
									<div class="top-row faq-sec">
										<div class="form-group my-3">
											<label class="form-label">Gallery name:</label>
											<input class="form-control" placeholder="Enter Gallery" type="text" name="gallery" style="width: 30%">
											
											
											
										</div>
										 <div class="form-group my-3">
                                                <label for="Email">Product image</label>
                                                <div class="uplodimgfil">
                                                   <input type="file"  accept=".jpg,.jpeg,.png"  name="images[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" onchange="validateFileType()" multiple />
                                                  <label for="file-1"></label>
                                                </div>
                                                <label id="file-1-error" class="error" for="file-1"></label>

                                            </div>

                                             <div class="col-sm-12 gallery">
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
				<script type="text/javascript">
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var file = input.files[i];
                    var fileName = file.name,
                    fileSize = file.size,
                    fileNameExtArr = fileName.split("."),
                    ext = fileNameExtArr[1];
                    console.log("fileSize : "+fileSize);

                    ext = ext.toLowerCase();
                    var reader = new FileReader();


                    reader.onload = function(event) {

                                var new_html = '<ul class="img_show "><li><div class="upimg"><img src="'+event.target.result+'" style="width:200px"></div></li></ul>';
                                $('.gallery').append(new_html);

                     }

                            reader.readAsDataURL(input.files[i]);
                  }
            }

        };

        $('#file-1').on('change', function() {


            imagesPreview(this, 'div.gallery');
            $('.gallery').html('');

        });
    });

</script>
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
				gallery:{
				required:true,
				minlength:3,
				},
				'images[]':{
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