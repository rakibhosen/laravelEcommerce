<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> 
          {{-- <img src="/images/faces/face4.jpg" alt="image"/>  --}}
          <span class="online-status online"></span> </div>
        <div class="profile-name">

         
      
          <p class="designation">Admin</p>
          <div class="badge badge-teal mx-auto mt-3">Online</div>
        </div>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{route('products')}}">
      <span class="menu-title">Dashboard</span></a>
    </li>

    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage Orders</span></i></a>
            <div class="collapse" id="order-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.order.index')}}">Manage order</a></li>
              </ul>
            </div>
          </li>
    

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> 
        <span class="menu-title">Manage Products</span>
        </i></a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.index')}}">Manage Products</a></li>
          </ul>
        </div>
      </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#order-pages" aria-expanded="false" aria-controls="order-pages"> 
        <span class="menu-title">Manage Orders</span>
        </i></a>
        <div class="collapse" id="order-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Manage Orders</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Manage Categories</span></i></a>
          <div class="collapse" id="category-pages">
          <ul class="nav flex-column sub-menu">

              <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.index')}}">Manage Category</a>
            </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> 
            <span class="menu-title">
            Manage Brands</span></i></a>
            <div class="collapse" id="brand-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.brand.index')}}">Manage Brand</a></li>
        
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage Divisions</span></i></a>
            <div class="collapse" id="division-pages">
              <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.division.index')}}">Add Division</a></li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">
              Manage Districts</span></i></a>
              <div class="collapse" id="district-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.district.index')}}">Add District</a></li>
                </ul>
              </div>
            </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="general-pages"> <span class="menu-title">
            Manage Sliders</span></i></a>
            <div class="collapse" id="slider-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.slider.index')}}">Manage Slider</a></li>
              </ul>
            </div>
          </li>




          </ul>
        </nav>
        <!-- partial -->
