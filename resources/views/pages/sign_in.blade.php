@extends('app')
@section('title', ' - Home')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/sign_in.css') }}">

    <section class="c1 container-md" id="sign_in_section">
        <div class="c2 row align-items-center">
            <div class="col-sm">
                <h1 class="fw-bolder">BLOG APP</h1>
                <h5>A Personal Blog Website</h5>
            </div>
            <div class="col-sm">
                <form id="sign_up_form" class="shadow-lg bg-white p-3 rounded-1 flex-column h-auto align-self-center mw-100">
                    @csrf
                    <div>
                        <h5 class="fw-bolder">Sign In</h5>
                    </div>
                    <div class="mb-2">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label for="password">Password</label>
                        <div class="input-group input-group-sm ">
                            <input :type="is_password_hidden ? 'password' : 'text'" class="form-control form-control-sm">
                            <button class="btn btn-outline-secondary" type="button" @click="toggle_password">
                                <i :class="is_password_hidden ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" id="btn_sign_in">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/sign_in.js') }}"></script>

@endsection