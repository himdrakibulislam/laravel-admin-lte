@extends('admin.app')
@section('title','edit-post')
@section('content')  
   <div class="m-2 d-flex align-items-center justify-content-center">
    <div class="m-4">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
              <!--category-->
              <div class="form-group">
                <label for="exampleInputEmail"> Category</label>
                <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror" id="">
                    <option value="" disabled selected>Chose Category</option>
                    @foreach ($category as $row)
                    @php
                        $subcategories = DB::table('subcategories')->where('category_id',$row->id)->get();
                    @endphp
                        <option disabled value="{{ $row->id }}">{{$row->category_name}}</option>
                        {{-- sub category --}}
                        @foreach ($subcategories as $cat)
                        <option class="text-info" value="{{ $cat->id }}" @if ($cat->id == $post->subcategory_id)
                            selected
                        @endif>---{{$cat->subcategory_name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            @error('subcategory_id')
             <div class="alert alert-danger">{{ $message }}<div>
            @enderror
                <!--title-->
                <div class="form-group">
                  <label for="exampleInputPassword1">Title</label>
                  <input type="text" value="{{ $post->title}}" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputPassword1" placeholder="Title" required>
                </div>
                @error('title')
                 <div class="alert alert-danger">{{ $message }}<div>
                @enderror
                 <!--description-->
              <div class="form-floating">
                <label for="floatingTextarea2">Description</label>
                <textarea name="description" id="summernote" class="form-control @error('post_date') is-invalid @enderror" placeholder="Description" id="floatingTextarea2" style="height: 100px" required>{{ $post->description}}</textarea>
               
              </div>
              @error('description')
              <div class="alert alert-danger">{{ $message }}<div>
             @enderror
              <!--tags -->
              <div class="form-group">
                <label for="exampleInputPassword1">Tags</label>
                <input type="text" name="tags" class="form-control @error('post_date') is-invalid @enderror" id="exampleInputPassword1" placeholder="Tags" 
                value="{{ $post->tags}}"
                >
              </div>
              @error('tags')
                 <div class="alert alert-danger">{{ $message }}<div>
                @enderror
             
                <!--sub category-->
                {{-- <div class="form-group">
                    <label for="exampleInputEmail">Chose Subcategory</label>
                    <select name="subcategory_id" class="form-control" id="">
                        @foreach ($subcategory as $category)
                            <option value="{{ $category->id }}">{{$category->subcategory_name}}</option>
                        @endforeach
                    </select>
                </div> --}}
              
                <!--date -->
              <div class="form-group">
                <label for="exampleInputPassword1">Date</label>
                <input type="date" value="{{ $post->post_date}}" name="post_date" class="form-control @error('post_date') is-invalid @enderror" id="exampleInputPassword1" placeholder="Date" required>
              </div>
              @error('post_date')
                 <div class="alert alert-danger">{{ $message }}<div>
                @enderror
               
              <!--post image-->
              <div class="form-group">
                <label for="exampleInputFile"> Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              @error('image')
              <div class="alert alert-danger">{{ $message }}<div>
             @enderror
             <!------- image--------->
             <input type="hidden" name="old_image" value="{{ $post->image }}">
             <!------- publish--------->
              <div class="form-check">
                <input type="checkbox" @if ($post->status ===1 ) checked
                    
                @endif name="status" value="1" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Published Now</label>
              </div>
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
    
        <!-- general form elements -->
       
      </div>
    
    
    
   </div>
@endsection

