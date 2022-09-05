@extends('admin.app')
@section('content')  
   <div class="m-2 d-flex align-items-center justify-content-center">
   
    <form method="POST" action="{{ route('subcategory.store') }}" class="w-50 border border-rounded-3 m-5  p-3">
        @csrf
       <h3 class="text-center mt-5 fw-bold">Add Subcategory</h3>
       {{-- @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
      </div>
       @endif --}}
        <div class="mb-3">
            <div class="form-group">
                <label for="exampleInputEmail"></label>
                <select name="category_id" class="form-control" id="">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
          <label for="exampleInputPassword1" class="form-label">Subcategory Name</label>
          <input 
           type="text"
           placeholder="Category Name"
           name="subcategory_name"
           class="form-control @error('subcategory_name') is-invalid @enderror"
           id="exampleInputPassword1"
           required
           >
           @error('category_name')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Subcategory</button>
      </form>
   </div>
@endsection
