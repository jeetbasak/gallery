@extends('layouts.app')
@section('title')
<title>Home </title>
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
                            <span>Dashboard</span>
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
                                        <a href="#">Home</a>
                                    </li>
                                    
                                </ol>
                                <!-- Page Content -->
                                <h1>Welcome</h1>
                                <hr>
                                <h4>{{@auth::user()->name}}</h4>
                            </div>
                            <!-- /.container-fluid -->
                            <!-- Sticky Footer -->
                            <footer class="sticky-footer">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright ?? Your Website 2019</span>
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