<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="{{ route('admin.index') }}"><img src="{{ asset('images/logo.svg') }}" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('admin.index') }}"><img src="/images/logo-mini.svg" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    

    
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
    

        <a class="nav-link logout">
                <form class="form-inline" action="{{route('admin.logout')}}" method="post">
                  {{csrf_field()}}
                  <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
              </a>



              

  </div>
</nav>
