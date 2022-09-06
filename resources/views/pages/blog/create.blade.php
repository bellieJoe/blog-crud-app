@extends('app')
@section('title', ' - Write Blog')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/blog/create.css') }}">

    <section id="create_blog_section">
        <div class="container">
            <form action="">
                <div class="mb-2">
                    <label for="content">Write Blog</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <button class="btn btn-outline-primary">Post</button>
                </div>
            </form>
        </div>
    </section>
@endsection