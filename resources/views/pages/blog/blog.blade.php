@extends('app')
@section('title', ' - Blogs')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/pages/blog/blog.css') }}">

    <section id="blog_section">
        <div class="container">
            <div class="blogs_list">
                @foreach ($blogs as $blog)
                    <div class="blog shadow-sm">
                        <div class="blog_header">
                            <h6>{{ $blog->blog_title }}</h6>
                            <label>Written By <span>{{ $blog->fullname }}</span> {{ $blog->created_at->diffForHumans() }}</label><br>
                        </div>
                        <div class="blog_content">
                            <p>{{ $blog->blog_content }}</p>
                        </div>
                        <div class="blog_footer">
                            <label>Last edited {{ $blog->updated_at->diffForHumans() }}</label>
                        </div>
                    </div>
                @endforeach
                {{ $blogs }}
            </div>
        </div>
    </section>
    
@endsection