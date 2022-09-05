@extends('admin.app')
@section('title','change-password')
@section('content')
   <div class="m-2 d-flex align-items-center justify-content-center">
    <form class="w-50 border border-rounded-3 m-5  p-3">
       <h3 class="text-center mt-5 fw-bold">Change Password</h3>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Current Password</label>
          <input 
           type="password"
           placeholder="Current Password"
           name="current_password"
           class="form-control"
           id="exampleInputPassword1"
           required
           >
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">New Password</label>
          <input 
          type="password"
          placeholder="New Password"
          name="new_password"
          class="form-control" 
          id="exampleInputPassword1"
          required
          >
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
          <input 
          type="password"
          placeholder="Confirm Password"
          name="confirm_password"
          class="form-control" 
          id="exampleInputPassword1"
          required
          >
        </div>
        
        <button type="submit" class="btn btn-primary">Change Password</button>
      </form>
   </div>
@endsection
