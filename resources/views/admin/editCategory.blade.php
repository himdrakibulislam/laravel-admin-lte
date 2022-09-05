@extends('admin.app')
@section('title','editCategory')
@section('content')  
   <div class="m-2 d-flex align-items-center justify-content-center">
   
    <form method="POST" action="{{ route('category.update',$category->id) }}" class="w-50 border border-rounded-3 m-5  p-3">
       @csrf
       @method('PUT')

       <h3 class="text-center mt-5 fw-bold">Edit Category</h3>
       @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
      </div>
       @endif
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Category Name</label>
          <input 
           type="text"
           placeholder="Category Name"
           name="category_name"
           value="{{ $category->category_name }}"
           class="form-control @error('category_name') is-invalid @enderror"
           id="exampleInputPassword1"
           required
           >
           @error('category_name')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
      </form>
   </div>
@endsection
