@extends('layouts.app')
@section('title')
<title>User | Gallery manage </title>
{{-- <meta property="title" content="{{@$content->meta_title}}">
<meta name="description" content="{{@$content->meta_desc}}">
<meta name="keywords" content="{{@$content->meta_keyword}}"> --}}
@endsection
@section('head')
@include('include.head')
@endsection
@section('left_part')
@include('include.left_part')
@endsection
@section('content')

{{-- ALL THE PAGE CONTENT START --}}
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
                        





  <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Gallery manage</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <a href="{{route('img.add.page')}}"> Add Gallery</a></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Gallery Name</th>
                    <th>Created Time</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
               
                <tbody>
                @foreach($gallery as $key=> $value)
				<tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
{{-- 
						<a style="margin-left: 5px;"><i class="fa add-round" style="background-color: lime">&#10003;</i></a>
						
						<a onclick="return confirm('Are you sure want to active this banner?');" href="" style="margin-left: 5px;"><i class="fa add-round" style="background-color: orange">+</i></a>
						
						<a href="#" type="button"  data-toggle="modal" data-target="#myModalview" style="margin-left: 5px; font-size:25px"><i class="fa fa-eye edit-round" aria-hidden="true"></i></a>
						 --}}
						 <a href="{{route('img.view.list',$value->id)}}" style="margin-left: 5px; color: blue">View</a>

						{{-- <a onclick="return confirm('Are you sure want to delete this Role?');" href="{{route('role.dlt',$value->id)}}" style="margin-left: 5px; color: red">Delete</a> --}}
						</td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
         
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
                    </div>
                    {{-- ALL THE PAGE CONTENT END --}}
            
                    @endsection
                    {{-- end content --}}
                    @section('script')
                    @include('include.script')
                    @endsection