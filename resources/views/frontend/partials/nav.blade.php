    <div class="container">
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="#">Specials</a></li>
            <li><a href="{{ route('admin.index') }}">My Account</a></li>


					<li class="nav-item" id="search">
        <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">
          <div class="form-group form-inline">
          <p class="search">
		<input type="text" class="form-control" name="search" placeholder="Search..."/>
	      </div>
	      <button type="submit" class="btn btn-default">Search</button>
        </p>
	    </form>
      </li>
   

          
          </ul>

          <ul class="nav navbar-nav navbar-right">
          <li>
          <p class="carts_show">
<a class="nav-link btn-cart-nav" href="{{route('carts.index')}}">
<button class="btn btn-danger">
      <span class=" mt-1">Cart</span>
              <span class="badge badge-warning" id="totalItems">
                {{ App\models\Cart::totalItems() }}
      </span>
      </button>

</a>
</p>
</li>
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
        <li class="dropdown">
            	
              <a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
              {{ Auth::user()->name }}
                  <span class="caret"></span>
              </a>

              <ul class="dropdown-menu drp-dwn">
           <li class="nav-item">
                      <a class="nav-link" href="{{ route('user.dashboard') }}">
                      Dashboard
                      </a>                         
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>

         

              </ul>
          </li>
      @endguest

          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
    </nav>
    </div>