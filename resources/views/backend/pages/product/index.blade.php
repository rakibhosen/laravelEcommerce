@extends('backend.layout.master')

@section('content')

<div class="main-panel">
     <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
            <!-- start  modal Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
 Add product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('admin.product.store') }}" method="post"  enctype="multipart/form-data">
                     {{ csrf_field() }}
                          
                           <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity">
            </div>


            <div class="form-group">
              <label for="quantity">Select Category</label>
               <select class="form-control" name="category_id">
              <option value="">Please select a category for the product</option>
              @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
               <option value="{{$parent->id}}"> {{$parent->name}}</option>
               @endforeach
                </select>
            </div>


            <div class="form-group">
              <label for="quantity">Select Brand</label>
               <select class="form-control" name="brand_id">
              <option value="">Please select a brand for the product</option>
              @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
               <option value="{{$brand->id}}"> {{$brand->name}}</option>
             @endforeach
                </select>
            </div> 

            
            <div class="form-group">
              <label for="image">Brand Image (optional)</label>
              <input type="file" class="form-control" name="product_image" id="image" >
            </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
                
       </form>
      </div>
  
    </div>
  </div>
</div>
            </div>
                <div class="card-body">
                
     <!-- ====== table start ===== -->
     <table class="table table-dark">
  <thead>
    <tr>
     <th>#</th>
     <th scope="col">Product title</th>
     <th scope="col"> Product Price</th>
     <th scope="col">Product quantity</th>
     <th scope="col">Product Image</th>

     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @php $i=1; @endphp
    @foreach($products as $product)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{ $product->title }}</td>
      <td>{{ $product->price }}</td> 
      <td>{{ $product->quantity }}</td>
      <td>
      @php $i=1; @endphp
      @foreach($product->imgs as $img)
      @if($i>0)
	    <img src="{{ asset('img/product/'. $img->image) }}" height="100px" width="100px">
    	@endif
	@php $i--; @endphp

@endforeach
  </td>
  
       <td>

    <a href="#edit_product{{ $product->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>

     <a href="#delete_product{{ $product->id }}" class="btn btn-danger" data-toggle="modal" >Delete</a>
      </td>

<!-- delete Modal............ -->
<div class="modal fade" id="delete_product{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel "style="color:#0000;">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <h5>Are you sure ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <form action="{{route('admin.product.delete',$product->id) }}" method="post">
          {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Yes</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit modal ......................-->
            

<!-- Modal -->
<div class="modal fade" id="edit_product{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="{{ route('admin.product.update',$product->id) }}" method="post"  enctype="multipart/form-data">
             {{ csrf_field() }}
                        
              <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title"  value="{{$product->title}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control">{{$product->description}}</textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" value="{{$product->price}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
            </div>


            <div class="form-group">
              <label for="quantity">Select Category</label>
               <select class="form-control" name="category_id">
              <option value="">Please select a category for the product</option>
              @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
               <option value="{{$parent->id}}" {{$product->category_id==$product->category->id?'selected' :''}}> {{$parent->name}}</option>
               @endforeach
                </select>
            </div>


            <div class="form-group">
              <label for="quantity">Select Brand</label>
               <select class="form-control" name="brand_id">
              <option value="">Please select a brand for the product</option>
              @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
               <option value="{{$brand->id}}"  {{$product->brand_id==$product->brand->id?'selected' :''}}> {{$brand->name}}</option>
             @endforeach
                </select>
            </div> 

            <div class="form-group">
              <label for="image">Product Image (optional)</label>
              <input type="file" class="form-control" name="product_image" id="image" >
            </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
                
       </form>
      </div>
  
    </div>
  </div>
      </td>

    </tr>
    @endforeach

  </tbody>
</table>
     <!-- ====== table end ===== -->
              </div>
              </div>
          </div>
        </div>

@endsection