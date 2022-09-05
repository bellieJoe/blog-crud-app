@extends('app')
@section('title', ' - Sign Up')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/sign_up.css') }}">

    <section id="sign_up_section" class="container">
        <div class="my-4">
            <h1 class="text-center fw-bolder">BLOG App</h1>
        </div>
        <form action="/user/register" method="POST" class="bg-white p-3 shadow-lg rounded-2">
            @csrf
            <div class="mb-2">
                <h5 class="fw-bold">Sign Up</h5>
            </div>
            <div class="mb-2">
                <label for="fullname">Fullname @include('components.required_field')</label>
                <input type="text" id="fullname" class="form-control" name="fullname" required value="{{ old('fullname') }}">
                @includeWhen($errors->first('fullname'), 'components.validation_err_msg', ['err_message' => $errors->first('fullname')])
            </div>
            <div class="mb-2">
                <label for="email">Email @include('components.required_field')</label>
                <input type="email" id="email" class="form-control" name="email" required  value="{{ old('email') }}">
                @includeWhen($errors->first('email'), 'components.validation_err_msg', ['err_message' => $errors->first('email')])
            </div>
            <div class="mb-2">
                <label for="password">Password @include('components.required_field')</label>
                <input type="password" id="password" class="form-control" name="password" required>
                @includeWhen($errors->first('password'), 'components.validation_err_msg', ['err_message' => $errors->first('password')])
            </div>
            <div class="mb-2">
                <label for="password_confirmation">Password Confirmation @include('components.required_field')</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <div class="row">
                <div class="col">
                    <a href="/signin" class="btn btn-clear-secondary col" id="btn_sign_in">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                        Sign In
                    </a>
                </div>
                <div class="col">
                    <button  class="btn btn-primary  col" id="btn_sign_up">
                        <i class="fa-solid fa-user"></i> 
                        Sign Up
                    </button>
                </div>
            </div>
        </form>
    </section>

    <script src="{{ asset('js/sign_up.js') }}"></script>
@endsection