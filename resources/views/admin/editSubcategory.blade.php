@extends('admin.app')
@section('content')  
   <div class="m-2 d-flex align-items-center justify-content-center">
   
    <form method="POST" action="{{ route('subcategory.update',$subcategory->id) }}" class="w-50 border border-rounded-3 m-5  p-3">
        @csrf
        @method('PUT')
       <h3 class="text-center mt-5 fw-bold">Edit Subcategory</h3>
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
                        <option value="{{ $category->id }}" @if ($subcategory->category_id == $category->id)
                        @selected(true)
                        @endif>{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
          <label for="exampleInputPassword1" class="form-label">Subcategory Name</label>
          <input 
           type="text"
           placeholder="Category Name"
           value="{{ $subcategory->subcategory_name }}"
           name="subcategory_name"
           class="form-control @error('subcategory_name') is-invalid @enderror"
           id="exampleInputPassword1"
           required
           >
           @error('category_name')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Subcategory</button>
      </form>
   </div>
@endsection
