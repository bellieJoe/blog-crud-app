@extends('app')
@section('title', ' - Sign Up')
@section('content')
    <section id="sign_up_section" class="container">
        <div class="my-4">
            <h1 class="text-center fw-bolder">BLOG App</h1>
        </div>
        <form action="" class="bg-white p-3 shadow-lg rounded-2">
            <div class="mb-2">
                <h5 class="fw-bold">Sign Up</h5>
            </div>
            <div class="mb-2">
                <label for="name">Fullname</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="name">Email</label>
                <input type="text" id="email" class="form-control">
            </div>
            <div class="mb-2">
                <label for="name">Password</label>
                <input type="password" id="password" class="form-control">
            </div>
            <div class="mb-2">
                <label for="name">Re-Type Password</label>
                <input type="password" id="password_retype" class="form-control">
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-clear-secondary  col" id="btn_sign_in">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                        Sign In
                    </button>
                </div>
                <div class="col">
                    <a href="/signup" class="btn btn-primary  col" id="btn_sign_up">
                        <i class="fa-solid fa-user"></i> 
                        Sign Up
                    </a>
                </div>
            </div>
        </form>
    </section>

    <script src="{{ asset('js/sign_up.js') }}"></script>
@endsection