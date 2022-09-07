@extends('app')
@section('title', ' - Write Blog')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/blog/create.css') }}">

    <section id="create_blog_section">
        <div class="container">
            <form action="/blog" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="blog_title">Title</label>
                    <input type="text" name="blog_title" class="form-control" required maxlength="100">
                    @includeWhen($errors->first('blog_title'), 'components.validation_err_msg', ['err_message' => $errors->first('blog_title')])
                </div>
                <div class="mb-2">
                    <label for="blog_content">Write Blog</label>
                    <textarea name="blog_content" id="blog_content" cols="30" rows="10" class="form-control" required maxlength="3000"></textarea>
                    @includeWhen($errors->first('blog_content'), 'components.validation_err_msg', ['err_message' => $errors->first('blog_content')])
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary" type="submit">Post</button>
                </div>
                @includeWhen(Session::has('message') ,'components.response_message', [
                    'status' => Session::get('status'),
                    'response_message' => Session::get('message')
                ])
            </form>
        </div>
    </section>
@endsection