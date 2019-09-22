 {{-- slider --}}
 {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

        @foreach(App\Models\Slider::orderBy('priority','asc')->get() as $slider)
           <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index}}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
          @endforeach

        </ol>
        <div class="carousel-inner">

        @foreach(App\Models\Slider::orderBy('priority','asc')->get() as $slider)
            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
              <img class="d-block w-100" src="{{ asset('img/slider/'.$slider->image) }}" alt="{{ $slider->title }}" style="height: 275px;width:100%;" />

              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $slider->title }}</h5>
                
                @if ($slider->button_text)
                  <p>
                    <a href="{{ $slider->button_link }}" target="_blank" class="btn btn-danger">{{ $slider->button_text }}</a>
                  </p>
                @endif

              </div>
          </div>
          @endforeach
          

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> --}}

      {{-- slider --}}




      <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                    @foreach(App\Models\Slider::orderBy('priority','asc')->get() as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index}}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>
                   @endforeach
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

             

                    @foreach(App\Models\Slider::orderBy('priority','asc')->get() as $slider)
                  
                    <div class="item {{ $loop->index == 0 ? 'active' : '' }}">
                      <img class="item" src="{{ asset('img/slider/'.$slider->image) }}" alt="{{ $slider->title }}" style="height: 275px;width:100%;" />
        
        
                      </div>
                 
                  @endforeach
                </div>

              
          
    
          
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>