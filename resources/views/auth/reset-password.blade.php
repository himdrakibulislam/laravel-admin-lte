@extends('admin.app')
@section('title','reset-password')
@section('logoutContent')
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
              <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
          
                <form  method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <!----email---->
                    
                  <div class="input-group mb-3">
                    <input type="email"
                    class="form-control"
                    placeholder="Email"
                    name="email"
                    value="{{old('email', $request->email)}}"
                    required
                    >
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <!----password---->
                  <div class="input-group mb-3">
                    <input type="password"
                    class="form-control"
                    placeholder="Password"
                    name="password"
                     required 
                    >
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <!----confirm password---->

                  <div class="input-group mb-3">
                    <input 
                    type="password" 
                    class="form-control"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    required
                    >
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary btn-block">Change password</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                <p class="mt-3 mb-1">
                  <a href="#">Login</a>
                </p>
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
    </div>    
@endsection
{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
