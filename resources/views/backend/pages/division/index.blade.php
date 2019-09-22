@extends('backend.layout.master')

@section('content')

<div class="main-panel">
     <div class="content-wrapper">
          <div class="card">
            <div class="card-header">
            <!-- start  modal Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
 Add Division
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

        <form action="{{ route('admin.division.store') }}" method="post"  >
         {{ csrf_field() }}
                          
                <div class="form-group">
              <label for="exampleInputEmail1">Division Name</label>
              <input type="text" class="form-control" name="division_name" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">priority</label>
              <input type="number" class="form-control" name="division_priority" >

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
     <th scope="col">Division Name</th>
     <th scope="col"> Division Priority</th>
     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($divisions as $division)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{ $division->name }}</td>
      <td>{{ $division->priority }}</td> 
<td>
    <a href="#edit_division{{ $division->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>

     <a href="#delete_division{{ $division->id }}" class="btn btn-danger" data-toggle="modal" >Delete</a>
      </td>

<!-- delete Modal............ -->
<div class="modal fade" id="delete_division{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

        <form action="{{route('admin.division.delete',$division->id) }}" method="post">
          {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Yes</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- edit modal ......................-->
            

<!-- Modal -->
<div class="modal fade" id="edit_division{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update division</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="{{ route('admin.division.update',$division->id) }}" method="post"  >
         {{ csrf_field() }}
                          
                <div class="form-group">
              <label for="exampleInputEmail1">Division Name</label>
              <input type="text" class="form-control" name="division_name" value="{{$division->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">priority</label>
              <input type="number" class="form-control" name="division_priority" value="{{$division->priority}}" >

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