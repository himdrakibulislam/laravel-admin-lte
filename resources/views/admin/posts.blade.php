@extends('admin.app')
@section('content')  

<!---push stack---->
@push('css')
        
@endpush
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <br>
                <a href="{{ route('post.create') }}" class="btn btn-outline-success">Add Post</a>
                <br>
                {{-- @if (session('success'))
                <div class="alert alert-success">
                 {{ session('success') }}
               </div>
                @endif --}}

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL NO</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                 <tbody>
                    @foreach ($posts as $key=>$row)
                       
                        <tr>
                            <td>{{++$key}}</td>
                        <td>{{$row->category->category_name}}</td>
                        <td>{{$row->subcategory->subcategory_name}}</td>
                        <td>{{$row->user->name}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{ date('d F Y',strtotime($row->post_date)) }}</td>
                        <td> <img src="{{$row->image}}" alt="" height="70px" width="110px"></td>
                        <td>
                            @if($row->status === 1)
                            <span class="badge badge-success">Success</span>
                        @else 
                        <span class="badgge badge-danger p-1 ">failed</span>
                        @endif
                        </td>
                        <td class="d-flex">
                           <!--edit-->
                            <a class="btn btn-info btn-sm me-1" href="{{ route('post.edit',$row->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                           <!--delete-->
                            <form action="{{ route('post.destroy',$row->id) }}" method="POST"
                                class=""
                                > 
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">   
                                <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash">
                                  </i>
                               
                                </button>
                        </form>
                            
                        </td>
                        </tr>
                    @endforeach
                 </tbody>
                  <tfoot>
                  <tr>
                    <th>SL NO</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!---push stack---->
    {{-- @push('script')
        
    @endpush --}}
@endsection
