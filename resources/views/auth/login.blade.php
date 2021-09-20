{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

 @extends('layouts.app')



@section('title')
<title> Login</title>
@endsection

@section('head')
@include('include.head')
@endsection




@section('content')
<!-- bannersec -->
{{-- <div class="top_mar"></div>


<section class="login-body">
    
    <div class="login-info">
        <div class="login-details">
            <div class="upper-login">
                <h2>Log In</h2>
                <p>Please enter your login info to continue</p>
            </div>
            @include('include.errors')
            <div class="login-from">
                <form method="post" action="{{route('login')}}" id="frm">
                    @csrf
                    <div class="form_area">                        
                        <input type="Email" class="texxt_box" placeholder="Email address" name="email" onfocus="this.removeAttribute('readonly');" readonly="" onclick="this.removeAttribute('readonly');" onblur="this.removeAttribute('readonly');">
                    </div>
                    <div class="form_area">                        
                        <div class="password-in">
                            <input id="password-field" type="password" class="texxt_box" name="password" placeholder="Password" onfocus="this.removeAttribute('readonly');" readonly="" onclick="this.removeAttribute('readonly');" onblur="this.removeAttribute('readonly');">
                            <div class="clearfix"></div>
                            <span toggle="#password-field" class="field-icon fa fa-fw fa-eye toggle-password"></span>

                        </div>
                        <label id="password-field-error" class="error" for="password-field"></label>
                    </div>
                    <input type="submit" name="" value="Log me in" class="submit-login">
                </form>
                    <div class="or-area">
                        <span>or continue with</span>
                     </div>

                      <div class="socials-btns">
                        <a href="{{route('login.social',['user_type'=>'user','provider_type'=>'google'])}}" class="common-btns  google-btn">
                           <img src="{{url('/')}}/public/assets/images/login-google.png" alt=""> Google
                        </a>
                        <a href="{{route('login.social',['user_type'=>'user','provider_type'=>'facebook'])}}" class="common-btns facebook-btn">
                           <img src="{{url('/')}}/public/assets/images/login-facebook.png" alt=""> Facebook
                        </a>
                     </div>
                     
                     <div class="fort-pass">
                        <a href="{{route('fgp.view')}}">Forgot password?</a>
                     </div>
                     <div class="bottom-account-div">
                     <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                  </div>
            </div>
        </div>
    </div>
</section> --}}
<div class="container">
    <div class="card card-login mx-auto mt-5">
        @include('include.errors')
      <div class="card-header">Login</div>
      <div class="card-body">
         <form method="post" action="{{route('login')}}" id="frm">
            @csrf
        {{--   <div class="form-group">
            <label for="inputEmail">Email address</label>
            <div class="form-label-group">
              <input type="Email" class="form-control" placeholder="Email address" name="email" >
              
            </div>
            <label id="email-error" class="error" for="email"></label>
          </div> --}}
          <div class="form-group">
            <div class="form-label-group">
                <p>Email address</p>
               
                <input type="Email" class="form-control" placeholder="Email address" name="email" >
              
            </div>
         <label id="email-error" class="error" for="email"></label>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <p>Password</p>
                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" >
              
            </div>
            <label id="password-field-error" class="error" for="password-field"></label>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
         
          <button type="submit"class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
        </form>
        <div class="text-center">
     
        </div>
      </div>
    </div>
  </div>

@endsection

{{-- @section('footer')
    @include('include.footer')
@endsection --}}

@section('script')
    @include('include.script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script> 
         <script>
            $(document).ready(function(){
                jQuery.validator.addMethod("emailonly", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/.test(value.toLowerCase());
    }, "Enter valid email");

              

                $('#frm').validate({

                    rules:{
                      
                        email:{
                            required:true,
                            emailonly: true,                 
                        },
                         password:{
                            required:true,
                            minlength:6,
                                                     
                        },
                       
                        

                    },
                    // messages:{
                    //      ph:{
                    //     required:'Please enter the mobile number',
                       
                    //     //maxlength:'Mobile number can have maximum 15 digits',
                    //     minlength:'Mobile number can have minimum 10 digits',
                    //     mobileonly:'enter valid mobile number',
                    //     },

                    // }


                });

            });
        </script>
@endsection

