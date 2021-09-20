 <nav class="navbar navbar-expand navbar-dark bg-primary static-top">

    <a class="navbar-brand mr-1" href="#">{{auth::user()->email}}</a>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        @if(auth::user()->user_type=='A')
       <b>Admin panel</b>
       @else
        <b>User panel</b>

       @endif
        </div>
      </div>
    </form>

 
  </nav>

 