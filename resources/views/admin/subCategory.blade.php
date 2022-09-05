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
                <h3 class="card-title">All Sub-category</h3>
                <br>
                <a href="{{ route('subcategory.create') }}" class="btn btn-outline-success">Add subcategory</a>
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
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Sub Category Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                 <tbody>
                    @foreach ($subcategories as $key=>$row)
                       
                        <tr>
                            <td>{{++$key}}</td>
                        <td>{{$row->category->category_name}}</td>
                        <td>{{$row->subcategory_name}}</td>
                        <td>{{$row->subcategory_slug}}</td>
                        <td>
                           <!--edit-->
                            
                              <a  href="{{ route('subcategory.edit',$row->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                              </a>
                            
                             <!--delete-->
                            <form action="{{ route('subcategory.destroy',$row->id) }}" method="POST"
                                class="d-inline"
                                > 
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">   
                             <button type="submit"  class="btn btn-danger btn-sm">
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
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Sub Category Slug</th>
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
