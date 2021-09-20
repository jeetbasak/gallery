@extends('layouts.app')
@section('title')
<title>User | Images</title>
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
										<h2 class="my-1">All Image under {{$gallery->name}}</h2>
										
										<div class="right-sec">
											<ul>
											
												<li>
													<a href="{{route('img.view')}}" class="link">Back</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
							<div class="container">
   <div class="row">
          @foreach($all_img as $r)
         
              @if($r->image!='')
               <div class="col-md-3">
            <div class="row" style="margin-bottom: 10px">
           
              <img src="{{url('/')}}/storage/app/public/images/{{@$r->image}}" style="display: block !important;
              margin-left: auto !important;
              margin-right: auto !important;
              height: 140px;
              width:50% !important;"  data-toggle="modal"
              data-target="#mypic{{$r->id}}" >
               </div>
          </div>
              @endif
           
          @endforeach
        </div>
</div>
  @foreach($all_img as $r)


      <!-- Modal start-->
      <div class="modal fade" id="mypic{{$r->id}}" role="dialog">
        <div class="modal-dialog">
          
          <!-- Modal content-->
          <div class="modal-content" style="background-color: black; border:1px solid white;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="color: white;"> Images</h4>
            </div>
            <div class="modal-body"style="color: white;">
              
              <h5> Photo ID: {{$r->id}} </h5>

              <!--------------DELETE PICTURE --------------------- -->
              <a onclick="return confirm('are you sure')" href="{{route('img.dlt',$r->id)}}" class="btn btn-danger" style="float: right; border-radius: 360px; ">DELETE</a>
              
              <center><img src="{{url('/')}}/storage/app/public/images/{{@$r->image}}" style="width:80%;" ></center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>

        </div><!-- modal end -->
      </div>
        @endforeach
								
								
								
								
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