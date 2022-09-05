@extends('admin.app')
@section('content')  
   <div class="m-2 d-flex align-items-center justify-content-center">
   
    <form method="POST" action="{{ route('category.store') }}" class="w-50 border border-rounded-3 m-5  p-3">
        @csrf
       <h3 class="text-center mt-5 fw-bold">Add Category</h3>
       {{-- @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
      </div>
       @endif --}}
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Category Name</label>
          <input 
           type="text"
           placeholder="Category Name"
           name="category_name"
           class="form-control @error('category_name') is-invalid @enderror"
           id="exampleInputPassword1"
           required
           >
           @error('category_name')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
      </form>
   </div>
@endsection
