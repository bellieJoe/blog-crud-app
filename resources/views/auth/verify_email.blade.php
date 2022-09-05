@extends('app')
@section('title', ' - Email Verification')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/verify_email.css') }}">

    <section id="verify_email_section" class="container">
        <div class=" row align-items-center justify-items-center vh-100">
            
            <form action="" method="POST">
                <h4 class="text-center fw-bold">It seems that {{-- Auth::user()->email --}} is not yet verified, please verify your email using the verification link sent to your email.</h4>
                <h6 class="text-center">Did'nt receive a verification email? </h6>
                <button class="btn btn-dark d-block mx-auto">Resend</button>
                {{-- @if ($message) --}}
                <div class="alert alert-success mt-2">
                    {{-- {{ $message }} --}}
                    verification email successfully sent
                </div>
                {{-- @endif --}}
            </form>
            
            
        </div>
        
    </section>
@endsection